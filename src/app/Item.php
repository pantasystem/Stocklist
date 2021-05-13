<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Home;
use App\User;
use App\Box;
use App\Disposable;
use App\Stock;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    //
    protected $fillable = ['name', 'description', 'home_id','box_id' , 'image_path'];

    protected $with = ['disposable'];

    protected $appends = ['is_disposable', 'item_quantity', 'stock_ids', 'image_url'];

    protected $hidden = ['disposable'];
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
        return $this->belongsToMany(User::class, 'owners', 'item_id', 'user_id');
    }


    /**
     * Stockを経由してBoxを取得する
     */
    public function boxes()
    {
        return $this->hasManyThrough(
            Box::class,
            Stock::class,
            'item_id', //中継テーブルの自分に対する参照キー
            'id', // 中間テーブルを参照する取得予定のテーブルのキー
            'id',
            'box_id'
        );
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function disposable()
    {
        return $this->hasOne(Disposable::class);
    }

    public function getIsDisposableAttribute()
    {
        return isset($this->disposable);
    }

    public function getItemQuantityAttribute()
    {
        if(is_null($this->stocks)){
            return null;
        }
        return $this->stocks->sum('count');
    }

    public function getStockIdsAttribute()
    {
        if(is_null($this->stocks)){
            return null;
        }
        return $this->stocks->pluck('id');
    }

    public function getImageUrlAttribute() 
    {
        return Storage::url($this->image_path);
    }
}
