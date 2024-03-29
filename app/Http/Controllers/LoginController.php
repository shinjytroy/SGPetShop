<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Footer;

class LoginController extends Controller
{
    public function index() {
        $footer = Footer::all();
        return view('login',compact('footer'));
    }

    public function login(Request $request) 
    {
        $email = $request->email;
        $pwd = $request->password;
        $user = User::where('email', '=', $email)->where('password', $pwd)->first();
        if ($user != null) {
            // save user to session
            $request->session()->put('user', $user);
            if ($user->role == 1) {
                return redirect()->route('admin.homedb')->with("messagelogin","");
            } else {
                return redirect()->route('home')->with("messagelogin","");
            }
        }
        return redirect()->route('login')->with("messagelogin","");
    }

    public function logout(Request $request) 
    {
        // xóa session
        $request->session()->flush();
        return redirect()->route('login')->with("messagelogout","");
    }
   
}
