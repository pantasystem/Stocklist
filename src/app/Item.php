<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Home;
use App\User;
use App\Box;
use App\Disposable;
use App\Stock;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;

class Item extends Model
{
    //
    protected $fillable = ['name', 'description', 'home_id','box_id' , 'image_path', 'category_id'];

    protected $with = ['disposable', 'category'];

    protected $appends = ['is_disposable', 'item_quantity', 'stock_ids', 'image_url', 'category_path'];

    protected $hidden = ['disposable', 'category_id', 'category'];
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

    public function category()
    {
        return $this->belongsTo(Category::class);
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
        return Config::get('app.url') . Storage::url($this->image_path);
    }

    public function getCategoryPathAttribute()
    {
        if($this->category == null) {
            return null;
        }
        return $this->category->path;
    }
}
