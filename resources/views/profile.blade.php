@extends('layouts.main')

@section('content')
    @include('includes.navigation')

    <div class="container">
        <div class="row">
            <div class="col-md-6 border rounded mx-auto p-4 mt-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <img src="{{ asset('avatarImages/'.$user[0]->image) }}" width="250px" alt="profile image">
                @if($user[0]->id == Auth::id())
                <form action="{{ route('avatar') }}" method="post" enctype="multipart/form-data">@csrf
                    <input type="file" name="image" class="form-control">
                    <input type="hidden" name='id' value='{{ Auth::id() }}'>
                    <button type="submit" class="btn btn-primary btn-block">Upload</button>
                </form>
                @endif
                <p>Username: <b>{{ $user[0]->username }}</b></p>
                <p>Email: <b>{{ $user[0]->email }}</b></p>
                <p>Tweets(posts): <b>{{ $user[0]->posts->count() }}</b></p>
                <p>Followers: <b>{{ $followers }}</b></p>
                <p>Following: <b>{{ $following }}</b></p>
                @if( $user[0]->id != Auth::id() )
                    <form action="{{ $followCheck > 0 ? route('unfollow') : route('follow') }}" method="post">@csrf
                        <input type="hidden" name="follow_id" value="{{ $user[0]->id }}">
                        <input type="hidden" name="username" value="{{ $user[0]->username }}">
                        <button class="btn btn-primary btn-block" type="submit">{{ $followCheck > 0 ? 'UnFollow' : 'Follow' }}</button>
                    </form>
                @endif
            </div>
        </div>
        <h3 class="text-center mt-4">Personal Posts</h3>

        @foreach($user[0]->posts->sortByDesc('created_at') as $post)
        <div class="row">
            <div class="col-md-6 mx-auto rounded border mt-4">
                @if($post->image != null)
                <img src="{{ asset('postImages/'.$post->image) }}" width="500px" alt="post image">
                @endif
                <p>{{ $post->body }}</p>
                <p>{{ $user[0]->username }} <span>{{ $post->created_at }}</span></p>
            </div>
        </div>
        @endforeach

        

    </div>

 

@endsection