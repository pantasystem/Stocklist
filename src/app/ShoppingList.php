<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    //
    protected $fillable = [
        'title',
        'user_id',
        'home_id'
    ];
}
