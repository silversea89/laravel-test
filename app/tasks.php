<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'Classification','student_id','Title', 'toolman_id','Status','DateTime','DeadDateTime','BuyAddress', 'MeetAddress', 'Pay', 'content'
    ];
}
