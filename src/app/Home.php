<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    //

    protected $fillable = ['name'];

    /**
     * homeに所属するuser取得
     */
    public function members()
    {
        return $this->hasMany('App\User');
    }

    /**
     * homeの所有するItemを取得
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }

    /**
     * homeにあるnodes(部屋?)を取得
     */
    public function nodes()
    {
        return $this->hasMany('App\Node');
    }

}
