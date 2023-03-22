<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;



class authController extends Controller
{
    public function githubredirect(Request $request) {
        return Socialite::driver('github')->redirect();
    }

    public function githubcallback(Request $request) {
        $userData = Socialite::driver('github')->stateless()->user();

        $user =User::where('email',$userData->email)->where('auth_type','github')->first();
        if ($user) {
            // Ktra neu co tai khoan thi login
               // save user to session
               $request->session()->put('user', $user);
            Auth::login($user);
            return redirect()->route('home')->with("messagelogin","");
        }else {
            // neu khong co thi dang khy
            $request->session()->put('user', $user);
            $uuid= Str::uuid()->toString();
            $user = new User();
            $user->name = $userData->name;
            $user->email=$userData->email;
            $user->password = Hash::make($uuid.now());
            $user->auth_type ='github';
            $user->role =2;
            $user->save();
            Auth::login($user);
            return redirect()->route('home')->with("messageregister","");
        }
    
    }
        public function googleredirect(Request $request) {
            return Socialite::driver('google')->redirect();
        }
    
        public function googlecallback(Request $request) {
            $userData = Socialite::driver('google')->stateless()->user();
    
            $user =User::where('email',$userData->email)->where('auth_type','google')->first();
            if ($user) {
                // Ktra neu co tai khoan thi login
                $request->session()->put('user', $user);
                Auth::login($user);
                return redirect()->route('home')->with("messagelogin","");
            }else {
                // neu khong co thi dang khy
                $request->session()->put('user', $user);
                $uuid= Str::uuid()->toString();
                $user = new User();
                $user->name = $userData->name;
                $user->email=$userData->email;
                $user->password = Hash::make($uuid.now());
                $user->auth_type ='google';
                $user->role =2;
                $user->save();
                Auth::login($user);
                return redirect()->route('home')->with("messageregister","");
            }
       
       
    }
    

}
