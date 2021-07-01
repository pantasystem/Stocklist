<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateUser extends Model
{
    //
    protected $fillable = ['name', 'email', 'password'];
}
