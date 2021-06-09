<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ShoppingDetail;
use App\Home;
use App\User;

class ShoppingList extends Model
{
    //
    protected $fillable = [
        'title',
        'user_id',
        'home_id'
    ];

    public function details()
    {
        return $this->belongsTo(ShoppingDetail::class);
    }

    public function home() 
    {
        return $this->belongsTo(Home::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
