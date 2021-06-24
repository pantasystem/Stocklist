<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Stock;
use App\User;

class StockHistory extends Model
{
    //
    public function changeCount()
    {
        if($oldcount != count){
            return $timestamps;
        }
        $oldcount = count;
    }
}
