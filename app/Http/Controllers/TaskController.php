<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Tasks;

class TaskController extends Controller
{
    protected function Add(Request $request)
    {
        $user = Auth::user();
        $this->create(array_merge($request->all(), ['student_id' => $user->student_id]));
        return Redirect('/list');
    }

    protected function create(array $data)
    {
        Tasks::create([
            'Classification' => $data['Classification'],
            'student_id' => $data['student_id'],
            'Stuff' => $data['Stuff'],
            'Date' => $data['Date'],
            'Time' => $data['Time'],
            'BuyAddress' => $data['BuyAddress'],
            'MeetAddress' => $data['MeetAddress'],
            'Pay' => $data['Pay'],
            'content' => $data['Content'],
        ]);
    }     
}
