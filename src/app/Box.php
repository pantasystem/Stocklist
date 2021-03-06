<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\Home;
use App\Stock;


class Box extends Model
{
    
    protected $fillable = [/*'box_id',*/ 'name', 'description'];

    protected $hidden = ['box_id', 'room_id'];

    public function home() 
    {
        return $this->belongsTo(Home::class);
    }

    /*public function parentBox()
    {
        return $this->belongsTo(Box::class);
    }*/

    /*public function childrenBoxes()
    {
        return $this->hasMany(Box::class);
    }*/

    public function stocks() 
    {
        return $this->hasMany(Stock::class);
    }
}

