<?php

namespace App\Http\Controllers\Auth;

use App\department;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\VerifyUser;
use App\Mail\VerifyMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::LOGIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        error_log(print_r($data, true));
        return Validator::make($data, [
            'gender' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'student_id' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:255', 'unique:users', 'regex:/(09)[0-9]{8}/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    public function showRegistrationForm()
    {
        $department = department::all();
        return view('auth.register')->with(["department" => $department]);
    }

    protected function create(array $data)
    {

        $imageName = null;
        $Email = "s" . $data['student_id'] . "@nutc.edu.tw";

        if (isset($data['image'])) {
            $file = $data['image'];
            $imageName = $data['student_id'];
            $extension = $file->getClientOriginalExtension();
            $file_name = $imageName. "." .$extension;
            //TODO
            $file->move(getcwd()."/profileimages", $file_name);
        }
        else{
            if($data['gender']==1){
                $file_name = "Man.png";
            }
            elseif($data['gender']==2){
                $file_name = "Woman.png";
            }
            elseif ($data['gender']==3){
                $file_name = "Else.png";
            }
        }

        $user = User::create([
            'gender' => $data['gender'],
            'department' => $data['department'],
            'student_id' => $data['student_id'],
            'name' => $data['name'],
            'tel' => $data['tel'],
            'email' => $Email,
            'password' => Hash::make($data['password']),
            'photo' => $file_name,
        ]);

        $verifyUser = VerifyUser::create([
            'user_id' => $data['student_id'],
            'token' => sha1(time())
        ]);

        Mail::to($user->email)->send(new VerifyMail($user, $verifyUser));

        return $user;
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "您的帳號已完成驗證！您現在可以登入了。";
            } else {
                $status = "您的帳號已經驗證過囉！您現在可以登入了。";
            }
        } else {
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }
        return redirect('/login')->with('status', $status);
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('login')->with('status', '已寄出認證信件至您註冊的信箱，請至信箱查看後點擊連結以開通帳號。');
    }
}
