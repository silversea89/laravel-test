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
            'Classification' => $request['user'],
            'student_id' => $request['email'],
            'Title' => $request['title'],
            'content' => $request['content'],
        ]);

        redirect("contact");
    }

}
