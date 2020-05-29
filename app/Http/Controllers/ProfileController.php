<?php

namespace App\Http\Controllers;
use App\Classification;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    protected function showprofile(Request $request, $id)
    {
        $profile=DB::table('users')
            ->select('users.*')
            ->where('student_id', '=', $id)
            ->get();
        $taskaddrecord=DB::table('tasks')
            ->where('student_id','=',$id)
            ->count();
        $taskcompleterecord=DB::table('tasks')
            ->where('status','=','complete')
            ->count();
        $host_evaluation = DB::table('evaluation')
            ->join("tasks",'evaluation.tasks_id','=','tasks.tasks_id')
            ->where('host_id', '=', '$id')
            ->select('evaluation.*','tasks.Title')
            ->get();
        $toolman_evaluation = DB::table('evaluation')
            ->join("tasks",'evaluation.tasks_id','=','tasks.tasks_id')
            ->where('toolman_id', '=', '$id')
            ->select('evaluation.*','tasks.Title')
            ->get();
        return view('profile')->with(["profile" => $profile,
            "addrecord"=>$taskaddrecord,
            "completerecord"=>$taskcompleterecord,
            "host_evaluation"=>$host_evaluation,
            "toolman_evaluation"=>$toolman_evaluation]);
    }

}
