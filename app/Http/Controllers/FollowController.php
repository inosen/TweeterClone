<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function followUser(Request $request){

        $follow = new Follow();
        $follow->following_id = $request->follow_id;
        $follow->follower_id = Auth::id();
        $follow->save();

        return redirect('profile/'.$request->username);

    }

    public function unfollowUser(Request $request){

        $unfollow = Follow::where('follower_id',Auth::id())->where('following_id',$request->follow_id);
        $unfollow->delete();

        return redirect('profile/'.$request->username);

    }
}
