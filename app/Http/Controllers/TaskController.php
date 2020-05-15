<?php

namespace App\Http\Controllers;

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
        Tasks::create([
            'Classification' => $data['Classification'],
            'student_id' => $data['student_id'],
            'Title' => $data['Title'],
            'DateTime' => $combinedDT,
            'BuyAddress' => $data['BuyAddress'],
            'MeetAddress' => $data['MeetAddress'],
            'Pay' => $data['Pay'],
            'content' => $data['Content'],
        ]);
    }

    protected function showListForm(Request $request)
    {
        $classifications = Classification::all();
        $tasks = DB::table('tasks')
            ->leftJoin('users', 'tasks.student_id', '=', 'users.student_id')
            ->select('tasks.*', 'users.name')
            ->get();
        return view('list')->with(["classifications" => $classifications, "tasks" => $tasks]);
    }

    protected function showClassificationListForm(Request $request)
    {
        $classifications = Classification::all();
        $tasks = DB::table('Tasks')->where('Classification', 'Food')->get();
        return view('list')->with(["classifications" => $classifications, "tasks" => $tasks]);
    }
}
