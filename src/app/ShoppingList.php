<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ShoppingDetail;
use App\Home;
use App\User;

class ShoppingList extends Model
{
    //
    protected $with = ['details.item', 'user', 'details.box'];

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

    public function getIsAllCompletedAttribute()
    {
        if(isset($this->details)) {
            return null;
        }

        $completedCount = $this->details->sum(function($detail) {
            if($detail->complated_at == null) {
                return 0;
            }else{
                return 1;
            }
        });
        return $completedCount == $this->details->count();
    }
}
