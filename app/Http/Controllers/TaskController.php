<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\Events\taskhasgot;
use App\Events\arrive;
use App\Events\complete;
use App\Events\back;
use App\Events\taskstart;
use App\Report;
use App\Status;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Tasks;
use App\Classification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    protected function Add(Request $request)
    {
        $user = Auth::user();
        $this->create(array_merge($request->all(), ['student_id' => $user->student_id]));
        return Redirect('/list');
    }

    protected function create(array $data)
    {
        $date = $data['Date'];
        $time = $data['Time'];
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
        $deaddate = $data['DeadDate'];
        $deadtime = $data['DeadTime'];
        $combinedDDT = date('Y-m-d H:i:s', strtotime("$deaddate $deadtime"));

        $validatedData = Validator::make($data, [
            'Classification' => ['required', 'string', 'max:255'],
            'Student_id' => ['required', 'string', 'max:255'],
            'Title' => ['required', 'string', 'max:255'],
            'DateTime' => ['required', 'date', 'max:255', ' after:yesterday '],
            'DeadDateTime' => ['required', 'date', 'max:255'],
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
            'DeadDateTime' => $combinedDDT,
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
        $checktasks = DB::table('tasks')
            ->Join('users', 'tasks.student_id', '=', 'users.student_id')
            ->where('Status', '=', 'Selectable')
            ->get();

//        foreach ($checktasks as $i) {
//            if ($i->DeadDateTime < Carbon::now()) {
//                $taskexpire = Tasks::find($i->Tasks_id);
//                $taskexpire->Status = 'Expired';
//                $taskexpire->save();
//            }
//            $host_AVGrate = $i->host_rate_avg;
//            if ($host_AVGrate != null) {
//                while ($host_AVGrate >= 1) {
//                    $host_AVGrate -= 1;
//                    array_push($host_AVG_array, 1);
//                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
//                        array_push($host_AVG_array, 0.5);
//                    }
//                }
//                while (count($host_AVG_array) < 5) {
//                    array_push($host_AVG_array, 0);
//                }
//            } else {
//                array_push($host_AVG_array, "尚無資料");
//            }
//            $host_AVG_array_tasks[$i->Student_id] = $host_AVG_array;
//            $host_AVG_array = array();
//        }
        if($request->input('order')==null or $request->input('order')=="newest"){
            $tasks = DB::table('tasks')
                ->Join('users', 'tasks.student_id', '=', 'users.student_id')
                ->where('Status', '=', 'Selectable')
                ->orderBy('tasks.created_at', 'desc')
                ->get();
        }
        elseif($request->input('order')=="exp"){
            $tasks = DB::table('tasks')
                ->Join('users', 'tasks.student_id', '=', 'users.student_id')
                ->where('Status', '=', 'Selectable')
                ->orderBy('users.task_count', 'desc')
                ->get();
        }
        elseif($request->input('order')=="eva"){
            $tasks = DB::table('tasks')
                ->Join('users', 'tasks.student_id', '=', 'users.student_id')
                ->where('Status', '=', 'Selectable')
                ->orderBy('users.host_rate_avg', 'desc')
                ->get();
        }
        elseif($request->input('order')=="price"){
            $tasks = DB::table('tasks')
                ->Join('users', 'tasks.student_id', '=', 'users.student_id')
                ->where('Status', '=', 'Selectable')
                ->orderBy('tasks.Pay', 'desc')
                ->get();
        }
        foreach ($tasks as $i) {
            if ($i->DeadDateTime < Carbon::now()) {
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
            "TitleClass" => "全部",
            "orderBy" => "",
            "keyword" => ""]);
    }

    protected function showSearchListForm(Request $request)
    {
        $classifications = Classification::all();
        $user = Auth::user();
        $id = $user->student_id;
        $host_AVG_array = array();
        $host_AVG_array_tasks = array();
//        $classifications = Classification::all();
//        $classification_target = Classification::where('ClassValue', $request->input('Classification'))->first();

        if ($request->input('keyword') != null)
            $search_keyword = $request->input('keyword');
        else
            $search_keyword = "";
//        $sort_by = $request->input('sort_by');

//
//        $checktasks = DB::table('tasks')
//            ->Join('users', 'tasks.student_id', '=', 'users.student_id')
//            ->where('Status', '=', 'Selectable')
//            ->get();

        $tasks = DB::table('tasks')
            ->join('users', 'tasks.student_id', '=', 'users.student_id')
            ->where('Title', 'LIKE', "%$search_keyword%")
            ->where('Status', '=', 'Selectable')
            ->orderBy('users.created_at', 'desc')
            ->get();
//        if ($classification_target['ClassValue'] == "All") {

//        } else {
//            $tasks = DB::table('tasks')
//                ->join('users', 'tasks.Student_id', '=', 'users.Student_id')
//                ->where('Classification', $classification_target['ClassValue'])
//                ->where('Title', 'LIKE', "%$search_keyword%")
//                ->where('Status', '=', 'Selectable')
//                ->orderBy($sort_by, 'desc')
//                ->select('tasks.*', 'users.name')
//                ->get();
//        }
        foreach ($tasks as $i) {
            if ($i->DeadDateTime < Carbon::now()) {
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

        return view('list')->with([
            "classifications" => $classifications,
            "tasks" => $tasks,
            "host_AVGrate" => $host_AVG_array_tasks,
            "id" => $id,
            "orderBy" => "",
            "keyword" => $search_keyword
        ]);
    }

    protected function gettask(Request $request)
    {
        $user = Auth::user();
        $tasks_id = $request->tasks_id;
        $tasks = Tasks::find($tasks_id);
        $target = $tasks->Student_id;
        if ($tasks) {
            $tasks->get_by_toolman($user);
        }
        Evaluation::create([
            'Tasks_id' => $request->tasks_id
        ]);
        event(new taskhasgot($user, $target));
        return redirect('list');
    }

    protected function showListpush(Request $request)
    {
        $classifications = Classification::all();
        $user = Auth::user();
        $id = $user->student_id;
        $host_AVG_array_ING = array();
        $host_AVG_array_tasks_ING = array();
        $host_AVG_array_Com = array();
        $host_AVG_array_tasks_Com = array();
        $host_AVG_array_Wait = array();
        $host_AVG_array_tasks_Wait = array();
        $host_AVG_array_Ex = array();
        $host_AVG_array_tasks_Ex = array();
        $tasksING = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.student_id", "=", $id)
            ->where("tasks.Status", "=", "Processing")
            ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
            ->get();

        $tasksWaiting = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.Student_id", "=", $id)
            ->where("tasks.Status", "=", "Selectable")
            ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
            ->get();

        $tasksComplete = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.Student_id", "=", $id)
            ->where("tasks.Status", "=", "Complete")
            ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
            ->get();

        $tasksExpired = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.student_id", "=", $id)
            ->where("tasks.Status", "=", "Expired")
            ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
            ->get();
        foreach ($tasksING as $i) {
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array_ING, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array_ING, 0.5);
                    }
                }
                while (count($host_AVG_array_ING) < 5) {
                    array_push($host_AVG_array_ING, 0);
                }
            } else {
                array_push($host_AVG_array_ING, "尚無資料");
            }
            $host_AVG_array_tasks_ING[$i->Student_id] = $host_AVG_array_ING;
            $host_AVG_array_ING = array();
        }
        foreach ($tasksComplete as $i) {
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array_Com, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array_Com, 0.5);
                    }
                }
                while (count($host_AVG_array_Com) < 5) {
                    array_push($host_AVG_array_Com, 0);
                }
            } else {
                array_push($host_AVG_array_Com, "尚無資料");
            }
            $host_AVG_array_tasks_Com[$i->Student_id] = $host_AVG_array_Com;
            $host_AVG_array_Com = array();
        }
        foreach ($tasksWaiting as $i) {
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array_Wait, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array_Wait, 0.5);
                    }
                }
                while (count($host_AVG_array_Wait) < 5) {
                    array_push($host_AVG_array_Wait, 0);
                }
            } else {
                array_push($host_AVG_array_Wait, "尚無資料");
            }
            $host_AVG_array_tasks_Wait[$i->Student_id] = $host_AVG_array_Wait;
            $host_AVG_array_Wait = array();
        }
        foreach ($tasksExpired as $i) {
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array_Ex, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array_Ex, 0.5);
                    }
                }
                while (count($host_AVG_array_Ex) < 5) {
                    array_push($host_AVG_array_Ex, 0);
                }
            } else {
                array_push($host_AVG_array_Ex, "尚無資料");
            }
            $host_AVG_array_tasks_Ex[$i->Student_id] = $host_AVG_array_Ex;
            $host_AVG_array_Wait = array();
        }
        return view('list_push')->with(["classifications" => $classifications,
            "tasksING" => $tasksING,
            "tasksWaiting" => $tasksWaiting,
            "tasksComplete" => $tasksComplete,
            "tasksExpired" => $tasksExpired,
            "host_AVGrate" => $host_AVG_array_tasks_ING,
            "host_AVGrate_Com" => $host_AVG_array_tasks_Com,
            "host_AVGrate_Wait" => $host_AVG_array_tasks_Wait,
            "host_AVGrate_Ex" => $host_AVG_array_tasks_Ex,]);
    }

    protected function showListpushsearch(Request $request)
    {
        $host_AVG_array_ING = array();
        $host_AVG_array_tasks_ING = array();
        $host_AVG_array_Com = array();
        $host_AVG_array_tasks_Com = array();
        $host_AVG_array_Wait = array();
        $host_AVG_array_tasks_Wait = array();
        $host_AVG_array_Ex = array();
        $host_AVG_array_tasks_Ex = array();
        $classifications = Classification::all();
        $user = Auth::user();
        $id = $user->student_id;
        $classification_target = Classification::where('ClassValue', $request->input('Classification'))->first();
        if ($request->input('keyword') != null)
            $search_keyword = $request->input('keyword');
        else
            $search_keyword = "%";
        $sort_by = $request->input('sort_by');
        if ($classification_target['ClassValue'] == "All") {
            $tasksING = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.student_id", "=", $id)
                ->where("tasks.Status", "=", "Processing")
                ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
                ->get();

            $tasksWaiting = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.Student_id", "=", $id)
                ->where("tasks.Status", "=", "Selectable")
                ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
                ->get();

            $tasksComplete = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.Student_id", "=", $id)
                ->where("tasks.Status", "=", "Complete")
                ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
                ->get();

            $tasksExpired = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.student_id", "=", $id)
                ->where("tasks.Status", "=", "Expired")
                ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
                ->get();
        } else {
            $tasksING = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where('Classification', $classification_target['ClassValue'])
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->where("tasks.student_id", "=", $id)
                ->where("tasks.Status", "=", "Processing")
                ->orderBy($sort_by, 'desc')
                ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
                ->get();

            $tasksWaiting = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where('Classification', $classification_target['ClassValue'])
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->where("tasks.Student_id", "=", $id)
                ->where("tasks.Status", "=", "Selectable")
                ->orderBy($sort_by, 'desc')
                ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
                ->get();

            $tasksComplete = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where('Classification', $classification_target['ClassValue'])
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->where("tasks.Student_id", "=", $id)
                ->where("tasks.Status", "=", "Complete")
                ->orderBy($sort_by, 'desc')
                ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
                ->get();

            $tasksExpired = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where('Classification', $classification_target['ClassValue'])
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->where("tasks.student_id", "=", $id)
                ->where("tasks.Status", "=", "Expired")
                ->orderBy($sort_by, 'desc')
                ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
                ->get();
        }
        foreach ($tasksING as $i) {
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array_ING, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array_ING, 0.5);
                    }
                }
                while (count($host_AVG_array_ING) < 5) {
                    array_push($host_AVG_array_ING, 0);
                }
            } else {
                array_push($host_AVG_array_ING, "尚無資料");
            }
            $host_AVG_array_tasks_ING[$i->Student_id] = $host_AVG_array_ING;
            $host_AVG_array_ING = array();
        }
        foreach ($tasksComplete as $i) {
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array_Com, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array_Com, 0.5);
                    }
                }
                while (count($host_AVG_array_Com) < 5) {
                    array_push($host_AVG_array_Com, 0);
                }
            } else {
                array_push($host_AVG_array_Com, "尚無資料");
            }
            $host_AVG_array_tasks_Com[$i->Student_id] = $host_AVG_array_Com;
            $host_AVG_array_Com = array();
        }
        foreach ($tasksWaiting as $i) {
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array_Wait, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array_Wait, 0.5);
                    }
                }
                while (count($host_AVG_array_Wait) < 5) {
                    array_push($host_AVG_array_Wait, 0);
                }
            } else {
                array_push($host_AVG_array_Wait, "尚無資料");
            }
            $host_AVG_array_tasks_Wait[$i->Student_id] = $host_AVG_array_Wait;
            $host_AVG_array_Wait = array();
        }
        foreach ($tasksExpired as $i) {
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array_Ex, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array_Ex, 0.5);
                    }
                }
                while (count($host_AVG_array_Ex) < 5) {
                    array_push($host_AVG_array_Ex, 0);
                }
            } else {
                array_push($host_AVG_array_Ex, "尚無資料");
            }
            $host_AVG_array_tasks_Ex[$i->Student_id] = $host_AVG_array_Ex;
            $host_AVG_array_Wait = array();
        }
        return view('list_push')->with(["classifications" => $classifications,
            "tasksING" => $tasksING,
            "tasksWaiting" => $tasksWaiting,
            "tasksComplete" => $tasksComplete,
            "tasksExpired" => $tasksExpired,
            "host_AVGrate" => $host_AVG_array_tasks_ING,
            "host_AVGrate_Com" => $host_AVG_array_tasks_Com,
            "host_AVGrate_Wait" => $host_AVG_array_tasks_Wait,
            "host_AVGrate_Ex" => $host_AVG_array_tasks_Ex]);
    }

    protected function showListING(Request $request)
    {
        $classifications = Classification::all();
        $user = Auth::user();
        $id = $user->student_id;
        $host_AVG_array_ING = array();
        $host_AVG_array_tasks_ING = array();
        $host_AVG_array_Com = array();
        $host_AVG_array_tasks_Com = array();

        $tasksING = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.Toolman_id", "=", $id)
            ->where("tasks.Status", "=", "Processing")
            ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
            ->get();

        $tasksComplete = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.toolman_id", "=", $id)
            ->where("tasks.Status", "=", "Complete")
            ->select('tasks.*', 'host.name as hostname', 'host.task_count as task_count', 'host.host_rate_avg as host_rate_avg', 'toolman.name as toolmanname', 'status.StatusName')
            ->get();
        foreach ($tasksING as $i) {
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array_ING, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array_ING, 0.5);
                    }
                }
                while (count($host_AVG_array_ING) < 5) {
                    array_push($host_AVG_array_ING, 0);
                }
            } else {
                array_push($host_AVG_array_ING, "尚無資料");
            }
            $host_AVG_array_tasks_ING[$i->Student_id] = $host_AVG_array_ING;
            $host_AVG_array_ING = array();
        }
        foreach ($tasksComplete as $i) {
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array_Com, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array_Com, 0.5);
                    }
                }
                while (count($host_AVG_array_Com) < 5) {
                    array_push($host_AVG_array_Com, 0);
                }
            } else {
                array_push($host_AVG_array_Com, "尚無資料");
            }
            $host_AVG_array_tasks_Com[$i->Student_id] = $host_AVG_array_Com;
            $host_AVG_array_Com = array();
        }
        return view('list_ING')->with(["classifications" => $classifications,
            "tasksING" => $tasksING,
            "tasksComplete" => $tasksComplete,
            "host_AVGrate" => $host_AVG_array_tasks_ING,
            "host_AVGrate_Com" => $host_AVG_array_tasks_Com,]);
    }

    protected function showListINGsearch(Request $request)
    {
        $host_AVG_array_ING = array();
        $host_AVG_array_tasks_ING = array();
        $host_AVG_array_Com = array();
        $host_AVG_array_tasks_Com = array();
        $classifications = Classification::all();
        $user = Auth::user();
        $id = $user->student_id;
        $classification_target = Classification::where('ClassValue', $request->input('Classification'))->first();
        if ($request->input('keyword') != null)
            $search_keyword = $request->input('keyword');
        else
            $search_keyword = "%";
        $sort_by = $request->input('sort_by');

        if ($classification_target['ClassValue'] == "All") {
            $tasksING = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.Toolman_id", "=", $id)
                ->where("tasks.Status", "=", "Processing")
                ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
                ->get();

            $tasksComplete = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.toolman_id", "=", $id)
                ->where("tasks.Status", "=", "Complete")
                ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
                ->get();

        } else {
            $tasksING = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.Toolman_id", "=", $id)
                ->where("tasks.Status", "=", "Processing")
                ->where('Classification', $classification_target['ClassValue'])
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->orderBy($sort_by, 'desc')
                ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
                ->get();

            $tasksComplete = DB::table('tasks')
                ->leftJoin('users as host', 'tasks.Student_id', '=', 'host.student_id')
                ->leftJoin('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
                ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
                ->where("tasks.toolman_id", "=", $id)
                ->where("tasks.Status", "=", "Complete")
                ->where('Classification', $classification_target['ClassValue'])
                ->where('Title', 'LIKE', "%$search_keyword%")
                ->orderBy($sort_by, 'desc')
                ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
                ->get();

        }
        foreach ($tasksING as $i) {
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array_ING, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array_ING, 0.5);
                    }
                }
                while (count($host_AVG_array_ING) < 5) {
                    array_push($host_AVG_array_ING, 0);
                }
            } else {
                array_push($host_AVG_array_ING, "尚無資料");
            }
            $host_AVG_array_tasks_ING[$i->Student_id] = $host_AVG_array_ING;
            $host_AVG_array_ING = array();
        }
        foreach ($tasksComplete as $i) {
            $host_AVGrate = $i->host_rate_avg;
            if ($host_AVGrate != null) {
                while ($host_AVGrate >= 1) {
                    $host_AVGrate -= 1;
                    array_push($host_AVG_array_Com, 1);
                    if ($host_AVGrate >= 0.3 && $host_AVGrate <= 0.7) {
                        array_push($host_AVG_array_Com, 0.5);
                    }
                }
                while (count($host_AVG_array_Com) < 5) {
                    array_push($host_AVG_array_Com, 0);
                }
            } else {
                array_push($host_AVG_array_Com, "尚無資料");
            }
            $host_AVG_array_tasks_Com[$i->Student_id] = $host_AVG_array_Com;
            $host_AVG_array_Com = array();
        }
        return view('list_ING')->with(["classifications" => $classifications,
            "tasksING" => $tasksING,
            "tasksComplete" => $tasksComplete,
            "host_AVGrate" => $host_AVG_array_tasks_ING,
            "host_AVGrate_Com" => $host_AVG_array_tasks_Com,]);
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
        return view('list_id')->with(["tasks" => $tasks, "id" => $id, "evaluation" => $evaluation]);
    }

    protected function taskprogress(Request $request, $tasks_id)
    {
        $user = Auth::user();
        $id = $user->student_id;
        $tasks = Tasks::find($tasks_id);
        $target = $tasks->Student_id;
        $progress_get = $request->input("Progress");
        if ($progress_get == null) {
            $progress_change = Tasks::find($tasks_id);
            $progress_change->Progress = "go";
            $progress_change->save();
            event(new taskstart($user, $target));
        } elseif ($progress_get == "go") {
            $progress_change = Tasks::find($tasks_id);
            $progress_change->Progress = "back";
            $progress_change->save();
            event(new back($user, $target));
        } elseif ($progress_get == "back") {
            $progress_change = Tasks::find($tasks_id);
            $progress_change->Progress = "arrive";
            $progress_change->save();
            event(new arrive($user, $target));
        } elseif ($progress_get == "arrive") {
            $progress_change = Tasks::find($tasks_id);
            $progress_change->Progress = "complete";
            $progress_change->Status = "Complete";
            $progress_change->save();
            event(new complete($user, $target));
        }
        $tasks = DB::table('tasks')
            ->Join('users as host', 'tasks.Student_id', '=', 'host.student_id')
            ->Join('users as toolman', 'tasks.Toolman_id', '=', 'toolman.student_id')
            ->where('Tasks_id', '=', $tasks_id)
            ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname')
            ->first();

        $evaluation = DB::table('evaluation')
            ->where('Tasks_id', '=', $tasks_id)
            ->first();
        return view('list_id')->with(["tasks" => $tasks, "id" => $id, "evaluation" => $evaluation]);
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
        return redirect()->route('list');
    }
}
