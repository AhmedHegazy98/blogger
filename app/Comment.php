<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'name','auther_name','auther_email','body','post_id'
	];
     // Post Method
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}