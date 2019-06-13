<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        'title','body','published_at','category_id','image','status'
    ];

    public function auther(){
        return $this->belongsTo(User::class);
    }

    public function date(){
    return $this->created_at->diffForHumans();
    }

//    public function scopeLatestFirst(){
//        return $this->orderBy('created_at','sesc');
//    }

    // category Method
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     // Comment Method
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
