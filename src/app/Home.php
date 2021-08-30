<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Item;
use App\Box;
use App\Stock;
use App\Category;
use App\ShoppingList;

class Home extends Model
{
    //

    protected $fillable = ['name'];

    /**
     * homeに所属するuser取得
     */
    public function members()
    {
        return $this->hasMany(User::class, 'home_id');
    }


    
    public function boxes()
    {
        return $this->hasMany(Box::class);
    }


    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function stocks()
    {
        return $this->hasManyThrough(
            Stock::class,
            Item::class,
            'home_id',
            'item_id',
            'id',
            'id'
        );
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function shoppingLists()
    {
        return $this->hasMany(ShoppingList::class);
    }

}
