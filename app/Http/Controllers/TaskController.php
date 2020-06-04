<?php

namespace App\Http\Controllers;
use App\Evaluation;
use App\Status;
use App\User;
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

    // TODO validator
    protected function create(array $data)
    {
        $date = $data['Date'];
        $time = $data['Time'];
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
        $deaddate = $data['DeadDate'];
        $deadtime = $data['DeadTime'];
        $combinedDDT = date('Y-m-d H:i:s', strtotime("$deaddate $deadtime"));

        $validatedData=Validator::make($data,[
            'Classification' => ['required', 'string', 'max:255'],
            'student_id' => ['required', 'string', 'max:255'],
            'Title' => ['required', 'string', 'max:255'],
            'DateTime' => ['required', 'date', 'max:255',' after:yesterday '],
            'DeadDateTime' => ['required', 'date', 'max:255'],
            'BuyAddress' => ['required', 'string', 'max:255'],
            'MeetAddress' => ['required', 'string', 'max:255'],
            'Pay' => ['required', 'int', 'max:255', 'confirmed'],
            'content' => ['required', 'string', 'max:255'],
        ]);

        Tasks::create([
            'Classification' => $data['Classification'],
            'student_id' => $data['student_id'],
            'Title' => $data['Title'],
            'DateTime' => $combinedDT,
            'DeadDateTime' => $combinedDDT,
            'BuyAddress' => $data['BuyAddress'],
            'MeetAddress' => $data['MeetAddress'],
            'Pay' => $data['Pay'],
            'content' => $data['Content'],
        ]);

    }

//    TODO login required.
    protected function showListForm(Request $request)
    {
        $classifications = Classification::all();
        $user = Auth::user();
        $id = $user->student_id;
        $host_AVG_array = array();
        $tasks = DB::table('tasks')
            ->Join('users', 'tasks.student_id', '=', 'users.student_id')
            ->where('Status', '=', 'Selectable')
            ->get();

        $host_AVGrate=DB::table('users')
            ->where('student_id', '=', $id)
            ->select('host_rate')
            ->first();

        $host_AVGrate = get_object_vars($host_AVGrate)['host_rate'];

        if($host_AVGrate!=null){

            while($host_AVGrate >= 1){
            $host_AVGrate -= 1;
            array_push($host_AVG_array, 1);
            if($host_AVGrate>=0.3 && $host_AVGrate<=0.7){
                array_push($host_AVG_array, 0.5);
            }
            while(count($host_AVG_array)<5){
                array_push($host_AVG_array, 0);
            }}
        }
        else{
            array_push($host_AVG_array, "尚無資料");
        }

        return view('list')->with(["classifications" => $classifications, "tasks" => $tasks, "host_AVGrate"=>$host_AVG_array,"id" => $id]);
    }

    protected function showSearchListForm(Request $request)
    {
        $user = Auth::user();
        $id = $user->student_id;
        $classifications = Classification::all();
        $classification_target = Classification::where('ClassValue', $request->input('Classification'))->first();

        if ($request->input('keyword') != null)
            $search_keyword = $request->input('keyword');
        else
            $search_keyword = "%";
        $sort_by = $request->input('sort_by');


        $tasks = DB::table('tasks')
            ->join('users', 'tasks.student_id', '=', 'users.student_id')
            ->where('Classification', $classification_target['ClassValue'])
            ->where('Title', 'LIKE', "%$search_keyword%")
            ->orderBy($sort_by, 'desc')
            ->select('tasks.*', 'users.name')
            ->get();
        return view('list')->with(["classifications" => $classifications, "tasks" => $tasks, "id" => $id]);
    }

    protected function gettask(Request $request)
    {
        $tasks_id = $request->tasks_id;
        $tasks = Tasks::find($tasks_id);
        $user = Auth::user();

        if ($tasks) {
            $tasks->get_by_toolman($user);
        }

        return redirect('list');
    }

    protected function showListpush(Request $request)
    {
        $classifications = Classification::all();
        $user = Auth::user();
        $id = $user->student_id;

        $tasksING = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.student_id", "=", $id)
            ->where("tasks.Status", "=", "Processing")
            ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
            ->get();

        $tasksWaiting = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.student_id", "=", $id)
            ->where("tasks.Status", "=", "Selectable")
            ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
            ->get();

        $tasksComplete = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.student_id", "=", $id)
            ->where("tasks.Status", "=", "Complete")
            ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
            ->get();


        return view('list_push')->with(["classifications" => $classifications,
            "tasksING" => $tasksING,
            "tasksWaiting" => $tasksWaiting,
            "tasksComplete" => $tasksComplete]);
    }

    protected function showListING(Request $request)
    {
        $classifications = Classification::all();
        $user = Auth::user();
        $id = $user->student_id;

        $tasksING = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.toolman_id", "=", $id)
            ->where("tasks.Status", "=", "Processing")
            ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
            ->get();
        $tasksComplete = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.toolman_id", "=", $id)
            ->where("tasks.Status", "=", "Complete")
            ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname', 'status.StatusName')
            ->get();

        return view('list_ING')->with(["classifications" => $classifications,
            "tasksING" => $tasksING,
            "tasksComplete" => $tasksComplete]);
    }

    protected function taskdetail(Request $request, $tasks_id)
    {
        $user = Auth::user();
        $id = $user->student_id;
        $evaluation = DB::table('evaluation')
            ->where("evaluation.tasks_id","=",$tasks_id)
            ->first();
        $tasks = DB::table('tasks')
            ->leftJoin('users as host', 'tasks.student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.toolman_id', '=', 'toolman.student_id')
            ->where('tasks_id', '=', $tasks_id)
            ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname')
            ->first();
        return view('list_id')->with(["tasks" => $tasks, "id" => $id,"evaluation"=>$evaluation]);
    }

    protected function taskprogress(Request $request, $tasks_id)
    {
        $user = Auth::user();
        $id = $user->student_id;
        $progress_get = $request->input("Progress");
        if ($progress_get == null) {
            $progress_change = Tasks::find($tasks_id);
            $progress_change->Progress = "go";
            $progress_change->save();
        } elseif ($progress_get == "go") {
            $progress_change = Tasks::find($tasks_id);
            $progress_change->Progress = "back";
            $progress_change->save();
        } elseif ($progress_get == "back") {
            $progress_change = Tasks::find($tasks_id);
            $progress_change->Progress = "arrive";
            $progress_change->save();
        } elseif ($progress_get == "arrive") {
            $progress_change = Tasks::find($tasks_id);
            $progress_change->Progress = "complete";
            $progress_change->Status = "Complete";
            $progress_change->save();
        }
        $tasks = DB::table('tasks')
            ->Join('users as host', 'tasks.student_id', '=', 'host.student_id')
            ->Join('users as toolman', 'tasks.toolman_id', '=', 'toolman.student_id')
            ->where('tasks_id', '=', $tasks_id)
            ->select('tasks.*', 'host.name as hostname', 'toolman.name as toolmanname')
            ->first();
        return view('list_id')->with(["tasks" => $tasks, "id" => $id]);
    }

    protected function taskcomplete(Request $request){
        $user = Auth::user();
        $id=$user->student_id;
        $this->evaluation_add(array_merge($request->all(), ['self_id' => $id]));
        $tasks = DB::table('tasks')
            ->where('tasks_id', '=', $request->tasks_id)
            ->first();

        $progress_change = Tasks::find($request->tasks_id);
        $progress_change->Status = "Complete";
        $progress_change->save();

        if($tasks->student_id==$id){
            return redirect()->route('list.push');
        }
        elseif($tasks->toolman_id==$id){
            return redirect()->route('list.ING');
        }
    }
    protected function evaluation_add(array $data){

        $tasks = DB::table('tasks')
            ->where('tasks_id', '=', $data['tasks_id'])
            ->first();

        $existdata=Evaluation::where('tasks_id','=',$data['tasks_id'])->first();

        if($data['self_id']==$tasks->student_id){
            if($existdata === null){
                Evaluation::create([
                    'tasks_id' => $data['tasks_id'],
                    'toolman_rate' => $data['toolman_rate'],
                    'toolman_comment' => $data['toolman_comment'],
                ]);
            }
            else{
                $putdata=Evaluation::find($data['tasks_id']);
                $putdata->toolman_rate=$data['toolman_rate'];
                $putdata->toolman_comment=$data['toolman_comment'];
                $putdata->save();
            }
        }
        if($data['self_id']==$tasks->toolman_id){
            if($existdata === null){
                Evaluation::create([
                    'tasks_id' => $data['tasks_id'],
                    'host_rate' => $data['host_rate'],
                    'host_comment' => $data['host_comment'],
                ]);
            }
            else{
                $putdata=Evaluation::find($data['tasks_id']);
                $putdata->host_rate=$data['host_rate'];
                $putdata->host_comment=$data['host_comment'];
                $putdata->save();
            }
        }

        $host_AVGrate=DB::table('evaluation')
            ->join("tasks",'evaluation.tasks_id','=','tasks.tasks_id')
            ->where('tasks.student_id', '=', $tasks->student_id)
            ->avg('host_rate');
        $toolman_AVGrate=DB::table('evaluation')
            ->join("tasks",'evaluation.tasks_id','=','tasks.tasks_id')
            ->where('tasks.toolman_id', '=', $tasks->toolman_id)
            ->avg('toolman_rate');


        $toolman_AVGrate_update = User::find($tasks->toolman_id);
        $toolman_AVGrate_update->toolman_rate = $toolman_AVGrate;
        $toolman_AVGrate_update->save();

        $host_AVGrate_update = User::find($tasks->student_id);
        $host_AVGrate_update->host_rate = $host_AVGrate;
        $host_AVGrate_update->save();

    }
}
