<?php

namespace App\Http\Controllers;
use App\Classification;
use App\Contact;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    protected function AddContact(Request $request)
    {
        Contact::create([
            'User' => $request['user'],
            'Email' => $request['email'],
            'Title' => $request['title'],
            'Content' => $request['content'],
        ]);

        return view("contact");
    }

}
