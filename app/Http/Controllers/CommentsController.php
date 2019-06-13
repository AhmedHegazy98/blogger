<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $this->Validate($request,[
            'body'=>'required'

        ]);
    	
    	$post->comments()->create($request->all());
    	return redirect()->back()->with('message','Your Comment Successfully Send');
    }
}
