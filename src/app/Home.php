<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Item;
use App\Box;

class Home extends Model
{
    //

    protected $fillable = ['name'];

    /**
     * homeに所属するuser取得
     */
    public function members()
    {
        return $this->hasMany(User::class);
    }

    /**
     * homeの所有するItemを取得
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    
    public function boxes()
    {
        return $this->hasMany(Box::class);
    }

}
