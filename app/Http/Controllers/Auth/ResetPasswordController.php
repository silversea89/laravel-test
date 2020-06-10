<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $id = $user->student_id;
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $data = $request->all();
        $user = User::find($id);
        if (!\Hash::check($data['old_password'], $user->password)) {
            $message = '舊密碼輸入錯誤';
            return redirect()->route('Password.ShowReset')->withMessage($message);
        } elseif (strlen($data['new_password'])<8) {
            $message = '新密碼過短，請設置8字以上';
            return redirect()->route('Password.ShowReset')->withMessage($message);
        } else {
            $changepassword = User::find($id);
            $changepassword->password = Hash::make($data['new_password']);
            $changepassword->save();
            $message = '密碼修改成功';
            return redirect()->route('Password.ShowReset')->withMessage($message);
        }
    }
}
