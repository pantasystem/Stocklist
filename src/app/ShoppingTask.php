<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\Box;
use App\ShoppingList;

class ShoppingTask extends Model
{
    //
    protected $fillable = [
        'item_id',
        'count',
        'completed_at',
        'shopping_list_id',
        'box_id'
    ];

    protected $appends = ['is_completed'];
    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }

    public function getIsCompletedAttribute()
    {
        return $this->completed_at != null;
    }

}
