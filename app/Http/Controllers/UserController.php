<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
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
        //dd($user);

        //Find the followers & the following users
        $followers = Follow::where('following_id', $user[0]->id)->count();
        $following = Follow::where('follower_id', $user[0]->id)->count();
        
        //Check if you have already follow this user
        $followCheck = Follow::where('following_id', $user[0]->id)->where('follower_id', Auth::id())->count();

        return view('profile',compact('user','followers','following','followCheck'));
    
    }

    public function timeline(){

        $following_ids = Follow::where('follower_id',Auth::id())->get();

        foreach($following_ids as $fid){
            $users[] = User::where('id',$fid->following_id)->get();
        }

        if($following_ids->count() > 0){
            return view('timeline',compact('users','following_ids'));
        }else{
            return view('timeline',compact('following_ids'));
        }

    }

    public function usersList(){

        //Find all tweeterClone registered Users
        $users = User::all();

        //Save all follows, followings & followChecks to users collection
        foreach($users as $user){
            $followers = Follow::where('following_id', $user->id)->count();
            $user->setAttribute('followers', $followers);

            $following = Follow::where('follower_id', $user->id)->count();
            $user->setAttribute('following', $following);
            //Check if you have already follow this user
            $followCheck = Follow::where('following_id', $user->id)->where('follower_id', Auth::id())->count();
            $user->setAttribute('followCheck', $followCheck);
        }
        
        //Sort users by followers
        $users = $users->sortByDesc('followers');

        return view('list',compact('users','followers','following','followCheck'));

    }

}
