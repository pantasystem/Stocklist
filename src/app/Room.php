<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Home;
use App\Box;
use App\Item;

class Room extends Model
{

    protected $fillable = ['name', 'description', 'home_id'];

    public function home()
    {
        return $this->belongsTo(Home::class);
    }

    public function boxes()
    {
        return $this->hasMany(Box::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
