<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    protected function Add(Request $request)
    {
        $this->create($request->all());
    }

    protected function create(array $data)
    {
        return Task::create([
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
