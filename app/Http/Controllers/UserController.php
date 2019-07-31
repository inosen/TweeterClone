<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function login(Request $request){

        //Check if the user exists
        $credentials = $request->only('username','password');
        if(Auth::attempt($credentials)){
            return redirect()->route('timeline');
        }else{
            return redirect()->route('home');
        }
    }

    public function register(Request $request){
        
        //New User Registration
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        //Login the new user
        Auth::login($user);
        
        //redirect to timeline page
        return redirect()->route('timeline');

    }

    public function logout(){
        
        Auth::logout();
        return redirect()->route('home');

    }

    public function profileInfo($username){

        $user = User::where('username',$username)->get();
        return view('profile',compact('user'));
        //->orderBy('created_at','desc')
    }

}
