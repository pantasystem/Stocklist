<?php

namespace App;
use App\Item;

use Illuminate\Database\Eloquent\Model;

class Disposable extends Model
{
    //
    protected $primaryKeys = ['item_id'];
    protected $fillable = ['item_id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
