<?php

namespace App\Http\Controllers\Backend;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function provement()
    {

        $posts = Post::where('provement','=','0')->orderBy('created_at','sesc')->get();
        return view("backend/blog/index",compact('posts'));
    }

     /**
     * provemrnt the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function provementt($id)
    {
        Post::findOrFail($id)->where('id', $id)->update(['provement' => 1]);
        return redirect('/backend/blog')->with('message','Your Post Was provement Successfully!'); 
    }
}
