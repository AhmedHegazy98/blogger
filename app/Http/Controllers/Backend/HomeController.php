<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\User;
class HomeController extends BackendController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('backend/home/index',compact('user'));
    }
    

    public function edit(Request $request)
    {
    	$users = $request->user();
    	return view('backend/home/edit',compact('users'));
    }

    public function update(Request $request)
    {

    	$this->Validate($request,[
                    'name'=>'required',
                    'email'=>'required',
                    'password'=>'required',
                    'image'
                ]);

    	$users = $request->user();
    	$users->update($request->all());

    	return redirect()->back()->with("message","Account was updated successfully");
    }
}
