<?php

namespace App\Http\Controllers;

use App\Events\applicate;
use App\Evaluation;
use App\Events\arrive;
use App\Events\complete;
use App\Events\back;
use App\Events\taskstart;
use App\Events\givetask;
use App\Report;
use App\Status;
use App\User;
use App\Volunteer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Tasks;
use App\Classification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    protected function Add(Request $request)
    {
        $user = Auth::user();
        $this->create(array_merge($request->all(), ['student_id' => $user->student_id]));
        return Redirect('/list')->with('success', '委託新增成功!請至「已提出的委託」查看');;
    }

    protected function create(array $data)
    {
        $date = $data['Date'];
        $time = $data['Time'];
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));

        $validatedData = Validator::make($data, [
            'Classification' => ['required', 'string', 'max:255'],
            'Student_id' => ['required', 'string', 'max:255'],
            'Title' => ['required', 'string', 'max:255'],
            'DateTime' => ['required', 'date', 'max:255', ' after:yesterday '],
            'BuyAddress' => ['required', 'string', 'max:255'],
            'MeetAddress' => ['required', 'string', 'max:255'],
            'Pay' => ['required', 'int', 'max:255', 'confirmed'],
            'Content' => ['required', 'string', 'max:255'],
        ]);

        Tasks::create([
            'Classification' => $data['Classification'],
            'Student_id' => $data['student_id'],
            'Title' => $data['Title'],
            'DateTime' => $combinedDT,
            'BuyAddress' => $data['BuyAddress'],
            'MeetAddress' => $data['MeetAddress'],
            'Pay' => $data['Pay'],
            'Content' => $data['Content'],
        ]);
        DB::table('users')
            ->where('student_id', $data['student_id'])
            ->increment('task_count', 1);
    }

//    TODO login required.
    protected function showListForm(Request $request)
    {
        $classifications = Classification::all();
        $user = Auth::user();
        $id = $user->student_id;
        $host_AVG_array = array();
        $host_AVG_array_tasks = array();

        if ($request->input('keyword') != null)
            $search_keyword = $request->input('keyword');
        else
            $search_keyword = "";

        if ($request->input('order') == null or $request->input('order') == "newest") {
            $tasks = DB::table('tasks')
                ->Join('users', 'tasks.student_id', '=', 'users.student_id')
                ->where('Status', '=', 'Selectable')
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->orderBy('tasks.created_at', 'desc')
                ->paginate(12);
        } elseif ($request->input('order') == "exp") {
            $tasks = DB::table('tasks')
                ->Join('users', 'tasks.student_id', '=', 'users.student_id')
                ->where('Status', '=', 'Selectable')
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->orderBy('users.task_count', 'desc')
                ->paginate(12);
        } elseif ($request->input('order') == "eva") {
            $tasks = DB::table('tasks')
                ->Join('users', 'tasks.student_id', '=', 'users.student_id')
                ->where('Status', '=', 'Selectable')
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->orderBy('users.host_rate_avg', 'desc')
                ->paginate(12);
        } elseif ($request->input('order') == "price") {
            $tasks = DB::table('tasks')
                ->Join('users', 'tasks.student_id', '=', 'users.student_id')
                ->where('Status', '=', 'Selectable')
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->orderBy('tasks.Pay', 'desc')
                ->paginate(12);
        }
        foreach ($tasks as $i) {
            if ($i->DateTime < Carbon::now()) {
                $taskexpire = Tasks::find($i->Tasks_id);
                $taskexpire->Status = 'Expired';
                $taskexpire->save();
            }
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array, 0.5);
                    }
                }
                while (count($host_AVG_array) < 5) {
                    array_push($host_AVG_array, 0);
                }
            } else {
                array_push($host_AVG_array, "尚無資料");
            }
            $host_AVG_array_tasks[$i->Student_id] = $host_AVG_array;
            $host_AVG_array = array();
        }
        return view('list')->with(["classifications" => $classifications,
            "tasks" => $tasks,
            "host_AVGrate" => $host_AVG_array_tasks,
            "id" => $id,
            "keyword" => $search_keyword,
            "order" => $request->input('order')]);
    }


    protected function gettask(Request $request)
    {
        $user = Auth::user();
        $toolman = $request->Toolman_id;
        $tasks_id = $request->tasks_id;
        $tasks = Tasks::find($tasks_id);
        $target = $toolman;
        $name = DB::table('users')
            ->where('Student_id', '=', $target)
            ->pluck('name');
        $email = DB::table('users')
            ->where('Student_id', '=', $target)
            ->pluck('email');
        if ($tasks->Status == "Expired") {
            return redirect('list')->with('error', '此委託已過期!');
        } else if ($tasks) {
            $tasks->get_by_toolman($toolman);
            Evaluation::create([
                'Tasks_id' => $request->tasks_id
            ]);
            $to = collect([
                ['name' => $name[0], 'email' => $email[0]]
            ]);
            $params = [
                'say' => "雇主同意您的申請了! 點擊連結確認委託!",
                'link' => $tasks->Tasks_id
            ];
            Mail::to($to)->send(new \App\Mail\givetask_mail($params));
            event(new givetask($user, $target, $tasks));
            return redirect('list_push');
        }
    }

    protected function showListpush(Request $request)
    {
        $classifications = Classification::all();
        $user = Auth::user();
        $id = $user->student_id;
        $host_AVG_array = array();
        $host_AVG_array_tasks = array();

        if ($request->input('keyword') != null)
            $search_keyword = $request->input('keyword');
        else
            $search_keyword = "";

        if ($request->input('order') == null or $request->input('order') == "ING") {
            $tasks = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.student_id", "=", $id)
                ->where("tasks.Status", "=", "Processing")
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
                ->paginate(12);
        } elseif ($request->input('order') == "Waiting") {
            $tasks = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.Student_id", "=", $id)
                ->where("tasks.Status", "=", "Selectable")
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
                ->paginate(12);
        } elseif ($request->input('order') == "Complete") {
            $tasks = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.Student_id", "=", $id)
                ->where("tasks.Status", "=", "Complete")
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
                ->paginate(12);
        } elseif ($request->input('order') == "Expired") {
            $tasks = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.student_id", "=", $id)
                ->where("tasks.Status", "=", "Expired")
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
                ->paginate(12);
        }
        foreach ($tasks as $i) {
            if ($i->DateTime < Carbon::now()) {
                $taskexpire = Tasks::find($i->Tasks_id);
                $taskexpire->Status = 'Expired';
                $taskexpire->save();
            }
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array, 0.5);
                    }
                }
                while (count($host_AVG_array) < 5) {
                    array_push($host_AVG_array, 0);
                }
            } else {
                array_push($host_AVG_array, "尚無資料");
            }
            $host_AVG_array_tasks[$i->Student_id] = $host_AVG_array;
            $host_AVG_array = array();
        }
        return view('list_push')->with(["classifications" => $classifications,
            "tasks" => $tasks,
            "host_AVGrate" => $host_AVG_array_tasks,
            "order" => $request->input('order'),
            "keyword" => $search_keyword,]);
    }


    protected function showListING(Request $request)
    {
        $classifications = Classification::all();
        $user = Auth::user();
        $id = $user->student_id;
        $host_AVG_array = array();
        $host_AVG_array_tasks = array();
        if ($request->input('keyword') != null)
            $search_keyword = $request->input('keyword');
        else
            $search_keyword = "";

        if ($request->input('order') == null or $request->input('order') == "ING") {
            $tasks = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.Toolman_id", "=", $id)
                ->where("tasks.Status", "=", "Processing")
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
                ->paginate(12);
        } elseif ($request->input('order') == "Complete") {
            $tasks = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.toolman_id", "=", $id)
                ->where("tasks.Progress", "=", "Complete")
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
                ->paginate(12);
        } elseif ($request->input('order') == "Expired") {
            $tasks = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.toolman_id", "=", $id)
                ->where("tasks.Status", "=", "Expired")
                ->where("tasks.Progress", "!=", "Complete")
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
                ->paginate(12);
        }
        foreach ($tasks as $i) {
            if ($i->DateTime < Carbon::now()) {
                $taskexpire = Tasks::find($i->Tasks_id);
                $taskexpire->Status = 'Expired';
                $taskexpire->save();
            }
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array, 0.5);
                    }
                }
                while (count($host_AVG_array) < 5) {
                    array_push($host_AVG_array, 0);
                }
            } else {
                array_push($host_AVG_array, "尚無資料");
            }
            $host_AVG_array_tasks[$i->Student_id] = $host_AVG_array;
            $host_AVG_array = array();
        }
        return view('list_ING')->with(["classifications" => $classifications,
            "tasks" => $tasks,
            "host_AVGrate" => $host_AVG_array_tasks,
            "order" => $request->input('order'),
            "keyword" => $search_keyword]);
    }

    protected function taskdetail(Request $request, $Tasks_id)
    {
        $user = Auth::user();
        $id = $user->student_id;
        $evaluation = DB::table('evaluation')
            ->where("evaluation.Tasks_id", "=", $Tasks_id)
            ->first();
        $tasks = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
            ->where('Tasks_id', '=', $Tasks_id)
            ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname')
            ->first();
        $volunteer = DB::table('volunteer')
            ->where('Tasks_id', "=", $Tasks_id)
            ->get();
        $vol_count = DB::table('volunteer')
            ->where('Tasks_id', "=", $Tasks_id)
            ->count();
        return view('list_id')->with(["tasks" => $tasks,
            "id" => $id,
            "evaluation" => $evaluation,
            "volunteer" => $volunteer,
            "vol_count" => $vol_count]);
    }

    protected function taskprogress(Request $request, $tasks_id)
    {
        $user = Auth::user();
        $id = $user->student_id;
        $tasks = Tasks::find($tasks_id);
        $target = $tasks->Student_id;
        $name = DB::table('users')
            ->where('Student_id', '=', $target)
            ->pluck('name');
        $email = DB::table('users')
            ->where('Student_id', '=', $target)
            ->pluck('email');
        $progress_get = $request->input("Progress");
        if ($progress_get == null) {
            $progress_change = Tasks::find($tasks_id);
            $progress_change->Progress = "go";
            $progress_change->save();
            $to = collect([
                ['name' => $name[0], 'email' => $email[0]]
            ]);
            $params = [
                'say' => "工具人開始執行您的委託了! 點擊連結進行確認!",
                'link' => $tasks->Tasks_id
            ];
            Mail::to($to)->send(new \App\Mail\taskstart_mail($params));
            event(new taskstart($user, $target, $tasks));
        } elseif ($progress_get == "go") {
            $progress_change = Tasks::find($tasks_id);
            $progress_change->Progress = "back";
            $progress_change->save();
            $to = collect([
                ['name' => $name[0], 'email' => $email[0]]
            ]);
            $params = [
                'say' => "工具人正在回程的路上! 點擊連結進行確認!",
                'link' => $tasks->Tasks_id
            ];
            Mail::to($to)->send(new \App\Mail\back_mail($params));
            event(new back($user, $target, $tasks));
        } elseif ($progress_get == "back") {
            $progress_change = Tasks::find($tasks_id);
            $progress_change->Progress = "arrive";
            $progress_change->save();
            $to = collect([
                ['name' => $name[0], 'email' => $email[0]]
            ]);
            $params = [
                'say' => "工具人已到達面交地點! 點擊連結進行確認!",
                'link' => $tasks->Tasks_id
            ];
            Mail::to($to)->send(new \App\Mail\arrive_mail($params));
            event(new arrive($user, $target, $tasks));
        } elseif ($progress_get == "arrive") {
            $progress_change = Tasks::find($tasks_id);
            $progress_change->Progress = "complete";
            $progress_change->Status = "Complete";
            $progress_change->save();
            $to = collect([
                ['name' => $name[0], 'email' => $email[0]]
            ]);
            $params = [
                'say' => "您的委託已完成! 點擊連結進行確認!",
                'link' => $tasks->Tasks_id
            ];
            Mail::to($to)->send(new \App\Mail\complete_mail($params));
            event(new complete($user, $target, $tasks));
        }
        $volunteer = DB::table('volunteer')
            ->where('Tasks_id', "=", $tasks_id)
            ->get();
        $vol_count = DB::table('volunteer')
            ->where('Tasks_id', "=", $tasks_id)
            ->count();
        $tasks = DB::table('tasks')
            ->Join('users as host', 'tasks.Student_id', '=', 'host.student_id')
            ->Join('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
            ->where('Tasks_id', '=', $tasks_id)
            ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname')
            ->first();

        $evaluation = DB::table('evaluation')
            ->where('Tasks_id', '=', $tasks_id)
            ->first();
        return view('list_id')->with(["tasks" => $tasks, "id" => $id, "evaluation" => $evaluation, "volunteer" => $volunteer,
            "vol_count" => $vol_count]);
    }

    protected function taskcomplete(Request $request)
    {
        $user = Auth::user();
        $id = $user->student_id;
        $this->evaluation_add(array_merge($request->all(), ['self_id' => $id]));
        $tasks = DB::table('tasks')
            ->where('Tasks_id', '=', $request->tasks_id)
            ->first();

        $progress_change = Tasks::find($request->tasks_id);
        $progress_change->Status = "Complete";
        $progress_change->save();

        if ($tasks->Student_id == $id) {
            return redirect()->route('list.push');
        } elseif ($tasks->Toolman_id == $id) {
            return redirect()->route('list.ING');
        }
    }

    protected function evaluation_add(array $data)
    {
        $user = Auth::user();
        $name = $user->name;
        $tasks = DB::table('tasks')
            ->where('Tasks_id', '=', $data['tasks_id'])
            ->first();

        $existdata = Evaluation::where('Tasks_id', '=', $data['tasks_id'])->first();

        if ($data['self_id'] == $tasks->Student_id) {

            $putdata = Evaluation::find($data['tasks_id']);
            $putdata->Toolman_Rate = $data['toolman_rate'];
            $putdata->Toolman_Comment = $data['toolman_comment'];
            $putdata->HostName = $name;
            $putdata->T_Time = Carbon::now();;
            $putdata->save();

        }
        if ($data['self_id'] == $tasks->Toolman_id) {

            $putdata = Evaluation::find($data['tasks_id']);
            $putdata->Host_Rate = $data['host_rate'];
            $putdata->Host_Comment = $data['host_comment'];
            $putdata->ToolmanName = $name;
            $putdata->H_Time = Carbon::now();;
            $putdata->save();
        }

        $host_AVGrate = DB::table('evaluation')
            ->join("tasks", 'evaluation.Tasks_id', '=', 'tasks.Tasks_id')
            ->where('tasks.Student_id', '=', $tasks->Student_id)
            ->avg('Host_Rate');
        $toolman_AVGrate = DB::table('evaluation')
            ->join("tasks", 'evaluation.Tasks_id', '=', 'tasks.Tasks_id')
            ->where('tasks.Toolman_id', '=', $tasks->Toolman_id)
            ->avg('Toolman_Rate');


        $toolman_AVGrate_update = User::find($tasks->Toolman_id);
        $toolman_AVGrate_update->toolman_rate_avg = $toolman_AVGrate;
        $toolman_AVGrate_update->save();

        $host_AVGrate_update = User::find($tasks->Student_id);
        $host_AVGrate_update->host_rate_avg = $host_AVGrate;
        $host_AVGrate_update->save();

    }

    protected function report_add(Request $request)
    {
        $user = Auth::user();
        $id = $user->student_id;
        Report::create([
            'Tasks_id' => $request['tasks_id'],
            'Title' => $request['Title'],
            'UserName' => $id,
            'Reason' => $request['reason'],
            'Status' => "Waiting"
        ]);
        return redirect()->route('list')->with('success', '檢舉成功!');;
    }

    protected function volunteer(Request $request)
    {
        $user = Auth::user();
        $tasks = Tasks::find($request['tasks_id']);
        $target = $tasks->Student_id;
        $email = DB::table('users')
            ->where('Student_id', '=', $target)
            ->pluck('email');
        $name = DB::table('users')
            ->where('Student_id', '=', $target)
            ->pluck('name');
        $check = DB::table('tasks')
            ->where('Tasks_id', '=', $request['tasks_id'])
            ->pluck('Status');
        if ($check == '["Expired"]') {
            return redirect()->route('list')->with('error', '此委託已過期!');
        } else if (DB::table('volunteer')
                ->where('Tasks_id', '=', $request['tasks_id'])
                ->where('Student_id', '=', $user->student_id)
                ->count() > 0) {
            return redirect()->route('list')->with('error', '您已經對此委託提出過申請囉!');
        } else {
            Volunteer::create([
                'Tasks_id' => $request['tasks_id'],
                'Name' => $user->name,
                'Student_id' => $user->student_id,
            ]);
            $to = collect([
                ['name' => $name[0], 'email' => $email[0]]
            ]);
            $params = [
                'say' => "有人想要當您的工具人!",
                'link' => $tasks->Tasks_id
            ];
            Mail::to($to)->send(new \App\Mail\applicate_mail($params));

            event(new applicate($user, $target, $tasks));
            return redirect()->route('list')->with('success', '已成功提出申請!');
        }
    }
}
