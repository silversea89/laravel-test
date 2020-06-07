<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Report extends Model
{
    protected $fillable = [
        'Report_id', 'Tasks_id','Title','UserName','Reason','Status'
    ];
    protected $table = "report";
}
