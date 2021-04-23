<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Home;
use App\User;
use App\Node;

class Item extends Model
{
    //
    protected $fillable = ['name', 'description', 'image_path', 'node_id'];

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

    /**
     *  Itemの所属するnodeを取得
     */
    public function node()
    {
        return $this->belongsTo(Node::class);
    }

}
