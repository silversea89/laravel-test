<?php

namespace App\Http\Controllers;

use App\Classification;
use App\Contact;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{

    protected function read(Request $request)
    {
        $user = Auth::user();
        $read = DB::table('notifications')
            ->where('to', '=', $user->student_id)
            ->where('read', '=', '0')
            ->update(['read' => 1]);
        return "success";
    }
    protected function shownotificationsform(Request $request)
    {
        $user = Auth::user();
        $notification = DB::table('notifications')
            ->where('to', '=', $user->student_id)
            ->where('read','=','0')
            ->paginate(12);
        return view('notifications')->with(["notification" => $notification]);
    }
}
