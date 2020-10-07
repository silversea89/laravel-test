<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'id', 'from','to','message','read','created_at','href'
    ];
    protected $table = "notifications";

    public $timestamps = false;
}
