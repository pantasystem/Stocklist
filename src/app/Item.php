<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Home;
use App\User;
use App\Box;
use App\Disposable;
use App\Stock;

class Item extends Model
{
    //
    protected $fillable = ['name', 'description', 'home_id','box_id'];

    protected $with = ['disposable'];

    /**
     *  Itemの所属するHomeを取得
     */
    public function home()
    {
        return $this->belongsTo(Home::class);
    }

    /**
     *  Itemの所有するuserを取得
     */
    public function owners()
    {
        return $this->belongsToMany(User::class);
    }

    
    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function disposable()
    {
        return $this->hasOne(Disposable::class);
    }

    public function getIsDisposableAttribute($disposable)
    {
        return isset($disposable);
    }

}
