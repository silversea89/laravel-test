<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $fillable = [
        'Tasks_id', 'from','to','read'
    ];
    protected $table = "volunteer";

}
