<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'Classification','student_id','Stuff', 'DateTime','BuyAddress', 'MeetAddress', 'Pay', 'content'
    ];
}
