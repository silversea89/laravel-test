<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (!$user or $user->is_active){
            return $next($request);
        }
        else{
            $message = '因你違規次數已達上限，你的帳號已被凍結';
            auth()->logout();
            return redirect()->route('login')->withMessage($message);
            return $next($request);
        }

    }
}
