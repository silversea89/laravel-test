<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'Classification','user_id','Stuff', 'Date', 'Time', 'BuyAddress', 'MeetAddress', 'Pay', 'content'
    ];
}
