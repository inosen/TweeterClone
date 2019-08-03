<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public function savePost(Request $request){

        if($request->hasFile('image')){
            $path = $request->file('image');
            $filename = time().'.'.$path->getClientOriginalExtension();
            Image::make($path)->resize(500,250)->save('postImages/'.$filename);
        }

        //Create a new post record
        $post = new Post();
        $post->body = $request->input('post');
        //$post->image = $path->store('uploads','public');
        $post->image = $filename;
        $request->user()->posts()->save($post);

        //redirect to timeline
        return redirect()->route('timeline');

    }
}
