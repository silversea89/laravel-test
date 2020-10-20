<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class CheckNotification
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user!=null){
            View::composer('*', function($view){
                //any code to set $val variable
                $user = Auth::user();
                $notification = DB::table('notifications')
                    ->where('to', '=', $user->student_id)
                    ->where('read','=','0')
                    ->get();
                $count=DB::table('notifications')
                    ->where('to', '=', $user->student_id)
                    ->where('read','=','0')
                    ->count();
                $view->with(["notification"=>$notification,
                    "count"=>$count]);
            });
        }

        return $next($request);
    }
}
