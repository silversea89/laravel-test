<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'User','Email','Title', 'Content'
    ];

    protected $table = "contact";
}
