<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\Home;

class Category extends Model
{
    protected $fillable = ['path'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function home() 
    {
        return $this->belongsTo(Home::class);
    }
}
