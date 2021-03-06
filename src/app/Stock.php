<?php

namespace App;
use App\Item;
use App\Box;
use App\StockExpire;
use App\Home;
use App\StockHistory;


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

    public function scopeWhereByItemIdAndBoxId($query, $itemId, $boxId) 
    {
        if($itemId) {
            $query->where('item_id', '=',$itemId);
        }
        if($boxId) {
            $query->where('box_id', '=', $boxId);
        }
        return $query;
    }

    public function StockHistories()
    {
        return $this->belongsTo(StockHistory::class);
    }

}
