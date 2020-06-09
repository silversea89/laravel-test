<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Browse extends Model
{
    protected $fillable = [
        'Date', 'Count'
    ];
    protected $table = "browse";
    protected $primaryKey = 'Date';
    public $timestamps = false;
}
