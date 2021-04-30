<?php

namespace App;
use App\Item;
use App\Stock;
use App\StockExpire;

use Illuminate\Database\Eloquent\Model;

class Disposable extends Model
{
    //
    protected $primaryKeys = ['item_id'];
    protected $fillable = ['item_id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'item_id', 'item_id');
    }

    public function expires()
    {
        return $this->hasMany(StockExpire::class, 'item_id', 'item_id');
    }
}
