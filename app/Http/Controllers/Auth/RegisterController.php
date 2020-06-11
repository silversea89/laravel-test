<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
    protected function create(array $data)
    {
        $imageName = null;
        $Email = "s" . $data['student_id'] . "@nutc.edu.tw";
        $file = $data['image'];

        if ($file != null) {
            $imageName = $data['student_id'];
            $extension = $file->getClientOriginalExtension();
            $file_name = $imageName. "." .$extension;
            $file->move('C:\xampp\htdocs\toolman\laravel-test\public\profileimages', $file_name);
        }


        return User::create([
            'gender' => $data['gender'],
            'department' => $data['department'],
            'student_id' => $data['student_id'],
            'name' => $data['name'],
            'tel' => $data['tel'],
            'email' => $Email,
            'password' => Hash::make($data['password']),
            'photo' => $file_name
        ]);
    }
}
