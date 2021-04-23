<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    //
    protected $fillable = ['name', 'node_type_id', 'path'];

    /**
     * nodeに所属するitems取得
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }

    /**
     *  nodeの所属するHomeを取得
     */
    public function home()
    {
        return $this->belongsTo('App\Home');
    }

}
