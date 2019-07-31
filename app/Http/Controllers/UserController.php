<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follow;

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
        
        //Logout & redirect to the login/register page
        Auth::logout();
        return redirect()->route('home');

    }

    public function profileInfo($username){

        //Find the user with a specific username
        $user = User::where('username',$username)->get();

        //Find the followers & the following users
        $followers = Follow::where('following_id', Auth::id())->count();
        $following = Follow::where('follower_id', Auth::id())->count();
        
        //Check if you have already follow this user
        $followCheck = Follow::where('following_id', $user[0]->id)->where('follower_id', Auth::id())->count();

        return view('profile',compact('user','followers','following','followCheck'));
    
    }

}
