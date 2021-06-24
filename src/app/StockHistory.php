<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Stock;
use App\item;
use App\box;
use App\User;

class StockHistory extends Model
{
    //
    protected $fillable = [
        'stock_id', 
        'item_id', 
        'box_id', 
        'count'
    ];

    public function item()
    {
        return $this->belongsTo(item::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function box()
    {
        return $this->belongsTo(box::class);
    }

}
