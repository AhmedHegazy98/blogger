<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\User;
use App\Comment;


class BlogController extends Controller
{
    public function index()
    {

        $categories = Category::orderBy('name','asc')->get();
        $users = User::orderBy('name','asc')->get();
        $posts = Post::with('auther')->where('provement', '=', 1)->where('status', '=', 0)->orderBy('created_at','sesc')->get();
        return view("blog.index",compact('posts','categories','users'));
    }

    public function category($id)
    {
        $categories = Category::with('posts')->orderBy('name','asc')->get();
        $posts = Post::with('auther')->where('category_id',$id)->get();
        $users = User::orderBy('name','asc')->get();

        return view("blog.index",compact('users','posts','categories'));
    }


    public function auther($id)
    {
       
        $users = User::orderBy('name','asc')->get();
        $categories = Category::with('posts')->orderBy('name','asc')->get();
        $posts = Post::with('auther')->where('auther_id',$id)->get();
        return view("blog.index",compact('users','posts','categories'));
    }

    public function show($id)
    {

        $categories = Category::orderBy('name','asc')->get();
        $posts=Post::findOrFail($id); // validate on id
        $postComments = $posts->comments;
        $arr_posts=Post::all(); // validate on id
        $users = User::orderBy('name','asc')->get();
        return view("blog.show",compact('posts','categories','users','arr_posts','postComments'));
    }
}
