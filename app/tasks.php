<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'Classification','student_id','Title', 'DateTime','BuyAddress', 'MeetAddress', 'Pay', 'content'
    ];
}
