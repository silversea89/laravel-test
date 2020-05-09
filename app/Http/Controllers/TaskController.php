<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Tasks;

class TaskController extends Controller
{
    protected function Add(Request $request)
    {
        $this->create($request->all());
        return Redirect('/list');
    }

    protected function create(array $data)
    {
        Tasks::create([
            'Classification' => $data['Classification'],
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
