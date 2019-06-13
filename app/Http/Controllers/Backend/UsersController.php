<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;

class UsersController extends Controller
{

     protected $uploadPath ;

    public function __construct()
    {
        // Parent::__construct();
        $this->uploadPath=  public_path('upload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
         $users = User::all();
        return view('backend/users/index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = new User();
       return view('backend/users/create',compact('users'));
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
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);


        $data= $request->all();


        $request->user()->create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),

        ]);

        return redirect("/backend/users")->with("message", "New user was created successfully!");
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

        $users = User::findOrFail($id);
       return view("backend/users/edit",compact('users'));
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
        $this->Validate($request,[
            'name'=>'required',
            'email'=>'required',
        ]);
        
        User::findOrFail($id)->update($request->all());

        return redirect("/backend/users")->with("message", "User was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/backend/users')->with('message','Your users Was Deleted Successfully!');
    }

    public function editpassword(Request $request)
    {

        $users = $request->user();
        return view("backend/home/edit_password",compact('users'));
    }

    public function resetpassword(Request $request)
    {
        $this->Validate($request,[
            'new-password'=>'required',

        ]);

            $users = $request->user();
            $users->update([
                'password'=>bcrypt($request['new-password'])
            ]);

        return redirect("/home");

    }


}
