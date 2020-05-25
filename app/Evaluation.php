<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'tasks_id','host_id','toolman_id', 'toolman_evaluation','host_evaluation','toolman_comment','host_comment'
    ];
}
