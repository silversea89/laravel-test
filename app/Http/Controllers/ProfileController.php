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

    protected function showprofile(Request $request, $profile_id)
    {
        $profile = DB::table('users')
            ->select('users.*')
            ->where('student_id', '=', $profile_id)
            ->get();
        $taskaddrecord = DB::table('tasks')
            ->where('student_id', '=', $profile_id)
            ->count();
        $taskcompleterecord = DB::table('tasks')
            ->where('status', '=', 'complete')
            ->count();
        $host_evaluation = DB::table('evaluation')
            ->join("tasks", 'evaluation.tasks_id', '=', 'tasks.tasks_id')
            ->where('tasks.student_id', '=', $profile_id)
            ->select('evaluation.*', 'tasks.Title')
            ->get();
        $toolman_evaluation = DB::table('evaluation')
            ->join("tasks", 'evaluation.tasks_id', '=', 'tasks.tasks_id')
            ->where('tasks.toolman_id', '=', $profile_id)
            ->where('toolman_rate', '!=', 'null')
            ->select('evaluation.*', 'tasks.Title')
            ->get();

        $host_AVGrate = DB::table('users')
            ->where('student_id', '=', $profile_id)
            ->select('host_rate')
            ->first();
        $toolman_AVGrate = DB::table('users')
            ->where('student_id', '=', $profile_id)
            ->select('toolman_rate')
            ->first();

        $host_AVG_array = array();
        $toolman_AVG_array = array();
        $host_AVGrate = get_object_vars($host_AVGrate)['host_rate'];
        $toolman_AVGrate = get_object_vars($toolman_AVGrate)['toolman_rate'];

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
        if ($toolman_AVGrate != null) {
            while ($toolman_AVGrate >= 1) {
                $toolman_AVGrate -= 1;
                array_push($toolman_AVG_array, 1);
                if ($toolman_AVGrate >= 0.3 && $toolman_AVGrate <= 0.7) {
                    array_push($toolman_AVG_array, 0.5);
                }
            }
            while (count($toolman_AVG_array) < 5) {
                array_push($toolman_AVG_array, 0);
            }
        } else {
            array_push($toolman_AVG_array, "尚無資料");
        }

        return view('profile')->with(["profile" => $profile,
            "addrecord" => $taskaddrecord,
            "completerecord" => $taskcompleterecord,
            "host_evaluation" => $host_evaluation,
            "toolman_evaluation" => $toolman_evaluation,
            "host_AVGrate" => $host_AVG_array,
            "toolman_AVGrate" => $toolman_AVG_array]);
    }

}
