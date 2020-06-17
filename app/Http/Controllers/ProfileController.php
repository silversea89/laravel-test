<?php

namespace App\Http\Controllers;

use App\Classification;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;

class ProfileController extends Controller
{

    protected function showprofile(Request $request, $profile_id)
    {
        $profile = DB::table('users')
            ->select('users.*')
            ->where('Student_id', '=', $profile_id)
            ->get();
        $taskaddrecord = DB::table('tasks')
            ->where('student_id', '=', $profile_id)
            ->count();
        $taskcompleterecord = DB::table('tasks')
            ->where('status', '=', 'complete')
            ->where('toolman_id', '=', $profile_id)
            ->count();
        $host_evaluation = DB::table('evaluation')
            ->join("tasks", 'evaluation.Tasks_id', '=', 'tasks.Tasks_id')
            ->where('tasks.Student_id', '=', $profile_id)
            ->where('Host_Rate', '!=', 'null')
            ->select('evaluation.*', 'tasks.Title')
            -> Paginate(6);
        $toolman_evaluation = DB::table('evaluation')
            ->join("tasks", 'evaluation.Tasks_id', '=', 'tasks.Tasks_id')
            ->where('tasks.Toolman_id', '=', $profile_id)
            ->where('Toolman_Rate', '!=', 'null')
            ->select('evaluation.*', 'tasks.Title')
            -> Paginate(6);

        $host_AVGrate = DB::table('users')
            ->where('student_id', '=', $profile_id)
            ->select('host_rate_avg')
            ->first();
        $toolman_AVGrate = DB::table('users')
            ->where('student_id', '=', $profile_id)
            ->select('toolman_rate_avg')
            ->first();

        $host_AVG_array = array();
        $toolman_AVG_array = array();
        $host_AVGrate = get_object_vars($host_AVGrate)['host_rate_avg'];
        $toolman_AVGrate = get_object_vars($toolman_AVGrate)['toolman_rate_avg'];

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
    protected function changephoto(Request $request){

        $validatedData = $request->validate([
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);
        $file = $request['image'];
        $imageName = $request->student_id;
        $extension = $file->getClientOriginalExtension();
        $file_name = $imageName. "." .$extension;
        $file->move(getcwd()."\profileimages", $file_name);
        $change = User::find($request->student_id);
        $change->photo = $file_name;
        $change->save();

        return redirect()->route('profile.id', $request->student_id);
    }
}
