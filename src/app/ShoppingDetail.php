<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingDetail extends Model
{
    //
    protected $fillable = [
        'item_id',
        'count',
        'completed_at',
        'shopping_list_id',
        'stock_id'
    ];
}
