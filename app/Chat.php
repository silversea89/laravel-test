<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'Tasks_id', 'from','to','read'
    ];
    protected $table = "volunteer";
}
