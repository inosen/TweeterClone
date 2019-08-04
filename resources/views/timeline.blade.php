@extends('layouts.main')

@section('content')
    @include('includes.navigation')

    <div class="container">
        
        <h3 class="text-center">{{ Auth::user()->username }} is following the below users...</h3>

        @if($following_ids->count() > 0)
        @foreach($users as $user)
            @foreach($user[0]->posts->sortByDesc('created_at') as $post)
                <div class="row">
                    <div class="col-md-6 mx-auto rounded border mt-4">
                        @if($post->image != null)
                        <img src="{{ asset('postImages/'.$post->image) }}" width="500px" alt="post image">
                        @endif
                        <p>{{ $post->body }}</p>
                        <p><img src="{{ asset('avatarImages/'.$user[0]->image) }}" width="50px" alt="profile image"><a href="profile/{{ $user[0]->username }}">{{ $user[0]->username }} </a><span>{{ $post->created_at }}</span></p>
                    </div>
                </div>
            @endforeach
        @endforeach
        @else
        <h6 class="text-center mt-3 alert alert-danger">Sorry ..there are no posts to show because you are not following someone yet... :(</h6>
        @endif
    </div>

@endsection