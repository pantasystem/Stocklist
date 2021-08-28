<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invitation extends Model
{
    //
    protected $fillable = [
        'token', 'home_id', 'id', 'user_id', 'accepted_at'
    ];

    protected $hidden = [
        'token'
    ];

}
