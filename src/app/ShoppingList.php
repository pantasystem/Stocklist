<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ShoppingTask;
use App\Home;
use App\User;

class ShoppingList extends Model
{
    //
    protected $with = ['tasks','tasks.item', 'user', 'tasks.box'];
    protected $appends = ['is_all_completed'];

    protected $fillable = [
        'title',
        'user_id',
        'home_id'
    ];

    public function tasks()
    {
        return $this->hasMany(ShoppingTask::class);
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
        if(is_null($this->tasks)) {
            return false;
        }

        $completedCount = $this->tasks->sum(function($detail) {
            if($detail->complated_at == null) {
                return 0;
            }else{
                return 1;
            }
        });
        return $completedCount == $this->details->count();
    }
}
