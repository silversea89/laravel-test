<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Admin extends Model
{
    protected $fillable = [
        'Admin_id', 'AdminUserName','Account','Password'
    ];
    protected $table = "admin";
    protected $primaryKey = 'Admin_id';
}
