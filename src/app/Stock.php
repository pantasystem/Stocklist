<?php

namespace App;
use App\Item;
use App\Box;
use App\StockExpire;
use App\Home;


use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //

    protected $fillable = ['item_id', 'box_id', 'count'];

    protected $with = ['expire', 'item'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function expire()
    {
        return $this->hasOne(StockExpire::class);
    }

    public function home()
    {
        return $this->hasOneThrough(
            Home::class, 
            Item::class,
            'id',
            'id',
            'item_id',
            'home_id'
        );
    }
}
