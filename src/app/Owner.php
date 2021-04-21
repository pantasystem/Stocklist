<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //
    protected $primaryKeys = ['user_id', 'node_id'];
    protected $fillable = ['user_id', 'node_id'];
}
