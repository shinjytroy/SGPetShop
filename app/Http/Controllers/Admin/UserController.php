<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view ("admin.user.index", compact('users'));
        // return view ("admin.user.index")->with([
        //     'users' => $users
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , User $user) 
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'email|required|unique:users',
            
            'password' => 'min:6|max:12|required_with:confirm|same:confirm',
            'confirm' => 'min:6|max:12'
        ]); 
        $user::create($request->all());
        
        
        return redirect()->route('admin.user.index')->with('thongbao'.'Create Susccessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , User $user )
    {     
        $request->validate([
            'name' => 'required|min:3|max:50',
            // 'email' => 'email|required','email' => 'email|required',
            
            'password' => 'min:6|max:12|required_with:confirm|same:confirm',
            'confirm' => 'min:6|max:12'
        ]);  
        $user->update($request ->all());
        return redirect()->route('admin.user.index')->with('thongbao','Update Successed!');              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('thongbao','Delete Successed!');
    }
}
