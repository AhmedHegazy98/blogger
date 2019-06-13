<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Post ;
// use App\Http\Controllers\BackendController;

class BlogController extends BackendController
{

    protected $uploadPath ;

    public function __construct()
    {
        Parent::__construct();
        $this->uploadPath=  public_path('upload');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::where('provement','=','1')->orderBy('created_at','sesc')->get();
        return view("backend/blog/index",compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
       return view('backend/blog/create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->Validate($request,[
            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required',
            'image'=>'required|mimes:jpg,jpeg,bmp,png',
        ]);

        $data= $request->all();

         $imageName = time().'.'.$data['image']->getClientOriginalExtension();
         $path =  'upload/'.$imageName ;
            $data['image']->move(
               public_path().'/upload/',$imageName
            );

        $request->user()->posts()->create([
            'title'=>$data['title'],
            'body'=>$data['body'],
            'category_id'=>$data['category_id'],
            'status'=>$data['status'],
            'image'=> $path

        ]);
        return redirect('/')->with('message','Successfully:wait approve from admin');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=  Post::findOrFail($id);
       return view("backend/blog/edit",compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $this->Validate($request,[
            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required',
            'image'=>'mimes:jpg,jpeg,bmp,png',
        ]);

        if ($request->hasFile('image')) {
            $data= $request->all();

            $imageName = time().'.'.$data['image']->getClientOriginalExtension();
            $path =  'upload/'.$imageName ;
            $data['image']->move(
                public_path().'/upload/',$imageName
            );
            $post->update([
                'title'=>$data['title'],
                'body'=>$data['body'],
                'category_id'=>$data['category_id'],
                'status'=>$data['status'],
                'image'=> $path
            ]);
        }else{
            $post->update([
                'title'=>$request['title'],
                'body'=>$request['body'],
                'category_id'=>$request['category_id'],
                'status'=>$request['status'],
                'image'=> $post->image
            ]);
        }

        return redirect('/backend/blog')->with('message','Your Post Was Updated Successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect('/backend/blog')->with('message','Your Post Was Deleted Successfully!'); 
    }
}
