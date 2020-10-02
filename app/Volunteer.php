<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $fillable = [
        'Tasks_id', 'Name','Student_id'
    ];
    protected $table = "volunteer";

    public $timestamps = false;
}
