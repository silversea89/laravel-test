<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Evaluation extends Model
{
    protected $fillable = [
        'Tasks_id', 'Toolman_Rate','Host_Rate','Toolman_Comment','Host_Comment'
    ];
    protected $table = "evaluation";
    protected $primaryKey = 'Tasks_id';
    public $timestamps = false;
}
