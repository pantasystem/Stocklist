<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = ['name', 'description', 'image_path', 'node_id'];

    /**
     *  Itemの所属するHomeを取得
     */
    public function home()
    {
        return $this->belongsTo('App\Home');
    }

    /**
     *  Itemの所有するuserを取得
     */
    public function owners()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     *  Itemの所属するnodeを取得
     */
    public function node()
    {
        return $this->belongsTo('App\Node');
    }

}
