<?php

namespace App\Http\Middleware;

use Closure;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> c6fb136... fuck this shit

class CheckBlocked
{
    /**
     * Handle an incoming request.
     *
<<<<<<< HEAD
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
=======
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
>>>>>>> c6fb136... fuck this shit
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
<<<<<<< HEAD
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

=======
        if (auth()->check()) {
            if (auth()->user()->is_active == false) {
                $message = '您的帳號已被凍結，請聯絡管理員了解詳情';
                auth()->logout();
                return redirect()->route('login')->withMessage($message);
            }
        }
        return $next($request);
>>>>>>> c6fb136... fuck this shit
    }
}
