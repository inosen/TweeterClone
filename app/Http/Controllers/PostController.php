<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function savePost(Request $request){

        //Create a new post record
        $post = new Post();
        $post->body = $request->input('post');
        $request->user()->posts()->save($post);

        //redirect to timeline
        return redirect()->route('timeline');

    }
}
