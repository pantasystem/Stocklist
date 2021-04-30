<?php

namespace App;
use App\Item;
use App\Box;
use App\StockExpire;


use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //

    protected $fillable = ['item_id', 'box_id', 'count'];

    protected $with = ['expire'];

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
}
