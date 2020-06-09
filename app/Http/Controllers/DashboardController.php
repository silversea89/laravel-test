<?php

namespace App\Http\Controllers;
use App\Classification;
use App\Contact;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    protected function tasks(Request $request)
    {
        $tasks = DB::table('tasks')
            ->Join('users', 'tasks.student_id', '=', 'users.student_id')
            ->get();
        return view('Admin_Tasks')->with(["tasks" => $tasks]);
    }
    protected function members(Request $request)
    {
        $members = DB::table('users')
            ->get();
        return view('Admin_Member')->with(["members" => $members]);
    }
    protected function report(Request $request){
        $reports = DB::table('report')
            ->where('Status','=','Waiting')
            ->get();
        return view('Admin_Report')->with(["reports" => $reports]);
    }
}
