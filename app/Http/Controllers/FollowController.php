<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function followUser($follow_id){

        $follow = new Follow();
        $follow->following_id = $follow_id;
        $follow->follower_id = Auth::id();
        $follow->save();

    }

    public function unfollowUser(){

    }
}
