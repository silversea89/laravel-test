<?php

namespace App\Http\Controllers;

use App\Browse;
use App\Classification;
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
        $newesttasks = DB::table('tasks')
            ->leftJoin('users', 'tasks.Student_id', '=', 'users.student_id')
            ->where('Status', '=', 'Selectable')
            ->orderBy('tasks.created_at', 'desc')
            ->take(8)
            ->get();
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

        return view('welcome')
            ->with(["newesttasks" => $newesttasks,
                "members_amount" => $members_amount,
                "task_amount" => $task_amount,
                "task_complete_amount" => $task_complete_amount,
                "task_notcomplete_amount" => $task_notcomplete_amount]);

    }

}
