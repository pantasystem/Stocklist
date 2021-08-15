<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invitation extends Model
{
    //
    protected $fillable = [
        'token', 'home_id', 'id', 'timestamp', 'user_id'
    ];

    protected $hidden = [
        'token'
    ];

}
