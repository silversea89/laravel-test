<?php

namespace App\Http\Controllers;

use App\Browse;
use App\Classification;
use App\Tasks;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    protected function Welcome(Request $request)
    {
        $user = Auth::user();
        $id=$user->student_id;
        $host_AVG_array = array();
        $host_AVG_array_tasks = array();
        $Today = Carbon::today('Asia/Taipei');
        $CheckTodayData = Browse::where('Date', '=', $Today)->first();
        if ($CheckTodayData === null) {
            Browse::create([
                'Date' => $Today,
                'Count' => 0
            ]);
        }
        $BrowseTimes_Add = Browse::find($Today);
        $BrowseTimes_Add->Count += 1;
        $BrowseTimes_Add->save();

        $members_amount = DB::table('users')
            ->count();
        $task_amount = DB::table('tasks')
            ->count();
        $task_complete_amount = DB::table('tasks')
            ->where('Status', '=', 'complete')
            ->count();
        $task_notcomplete_amount = DB::table('tasks')
            ->where('Status', '=', 'selectable')
            ->count();

        $checktasks = DB::table('tasks')
            ->Join('users', 'tasks.student_id', '=', 'users.student_id')
            ->where('Status', '=', 'Selectable')
            ->get();
        foreach ($checktasks as $i){
            if($i->DeadDateTime < Carbon::now()){
                $taskexpire=Tasks::find($i->Tasks_id);
                $taskexpire->Status='Expired';
                $taskexpire->save();
            }
            $host_AVGrate= $i->host_rate_avg;
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
            $host_AVG_array_tasks[$i->Student_id]=$host_AVG_array;
            $host_AVG_array = array();
        }
        $newesttasks = DB::table('tasks')
            ->leftJoin('users', 'tasks.Student_id', '=', 'users.student_id')
            ->where('Status', '=', 'Selectable')
            ->orderBy('tasks.created_at', 'desc')
            ->take(8)
            ->get();
        return view('welcome')
            ->with(["newesttasks" => $newesttasks,
                "members_amount" => $members_amount,
                "task_amount" => $task_amount,
                "task_complete_amount" => $task_complete_amount,
                "task_notcomplete_amount" => $task_notcomplete_amount,
                "host_AVGrate"=>$host_AVG_array_tasks,
                "id"=>$id]);

    }

}
