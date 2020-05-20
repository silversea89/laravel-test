<?php

namespace App\Http\Controllers;
use App\Status;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Tasks;
use App\Classification;
use Illuminate\Support\Facades\DB;

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

    protected function showListForm(Request $request)
    {

        $classifications = Classification::all();
        $tasks=DB::table('tasks')
            ->leftJoin('users', 'tasks.student_id', '=', 'users.student_id')
            ->get();
        return view('list')->with(["classifications" => $classifications, "tasks" => $tasks]);
    }

    protected function showSearchListForm(Request $request)
    {
        $classifications = Classification::all();
        $classification_target = Classification::where('ClassValue', $request->input('Classification'))->first();

        if($request->input('keyword')!=null)
            $search_keyword = $request->input('keyword');
        else
            $search_keyword = "%";
        $sort_by = $request->input('sort_by');


            $tasks = DB::table('tasks')
            ->join('users', 'tasks.student_id', '=', 'users.student_id')
            ->where('Classification', $classification_target['ClassValue'])
            ->where('Title','LIKE', "%$search_keyword%")
            ->orderBy($sort_by,'desc')
            ->select('tasks.*', 'users.name')
            ->get();
        return view('list')->with(["classifications" => $classifications, "tasks" => $tasks]);
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
        $id=$user->student_id;
        $tasksall=DB::table('tasks')
            ->leftJoin('users as host', 'tasks.student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.student_id","=",$id)
            ->select('tasks.*', 'host.name as hostname','toolman.name as toolmanname','status.StatusName')
            ->get();
        $tasksING=DB::table('tasks')
            ->leftJoin('users as host', 'tasks.student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.student_id","=",$id)
            ->where("tasks.Status","=","Processing")
            ->select('tasks.*', 'host.name as hostname','toolman.name as toolmanname','status.StatusName')
            ->get();
        $tasksWaiting=DB::table('tasks')
            ->leftJoin('users as host', 'tasks.student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.student_id","=",$id)
            ->where("tasks.Status","=","Selectable")
            ->select('tasks.*', 'host.name as hostname','toolman.name as toolmanname','status.StatusName')
            ->get();
        $tasksComplete=DB::table('tasks')
            ->leftJoin('users as host', 'tasks.student_id', '=', 'host.student_id')
            ->leftJoin('users as toolman', 'tasks.toolman_id', '=', 'toolman.student_id')
            ->leftJoin('status', 'tasks.Status', '=', 'status.StatusValue')
            ->where("tasks.student_id","=",$id)
            ->where("tasks.Status","=","Complete")
            ->select('tasks.*', 'host.name as hostname','toolman.name as toolmanname','status.StatusName')
            ->get();
        return view('list_push')->with(["classifications" => $classifications,
            "tasksall" => $tasksall,
            "tasksING"=>$tasksING,
            "tasksWaiting"=>$tasksWaiting,
            "tasksComplete"=>$tasksComplete]);
    }

}
