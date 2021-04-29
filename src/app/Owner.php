<?php

namespace App;

use App\Item;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //
    protected $primaryKeys = ['user_id', 'item_id'];
    protected $fillable = ['user_id', 'item_id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
