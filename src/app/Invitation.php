<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    //
    protected $fillable = ['email', 'token', 'home_id'];

    protected $hidden = ['email', 'token'];
}
