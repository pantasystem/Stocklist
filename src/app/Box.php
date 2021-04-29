<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\Home;


class Box extends Model
{
    
    protected $fillable = ['box_id', 'name', 'description'];

    public function home() 
    {
        return $this->belongsTo(Home::class);
    }

    public function parentBox()
    {
        return $this->belongsTo(Box::class);
    }

    public function childrenBoxes()
    {
        return $this->hasMany(Box::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

