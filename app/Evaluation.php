<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Evaluation extends Model
{
    protected $fillable = [
        'tasks_id', 'toolman_rate','host_rate','toolman_comment','host_comment'
    ];
    protected $table = "evaluation";
    protected $primaryKey = 'tasks_id';
    public $timestamps = false;
}
