<?php

namespace App;

use App\Item;
use App\Stock;
use App\Disposable;

use Illuminate\Database\Eloquent\Model;

class StockExpire extends Model
{
    //
    protected $fillable = ['expiration_date', 'item_id', 'stock_id'];
    
    public function disposable()
    {
        return $this->belongsTo(Disposable::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

}
