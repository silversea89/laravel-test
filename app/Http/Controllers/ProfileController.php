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

    protected function showprofile(Request $request)
    {
        $user = Auth::user();
        $id=$user->student_id;
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
        return view('profile')->with(["profile" => $profile,"addrecord"=>$taskaddrecord,"completerecord"=>$taskcompleterecord]);
    }
}
