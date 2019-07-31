@extends('layouts.main')

@section('content')
    @include('includes.navigation')

    <div class="container">
        <div class="row">
            <div class="col-md-6 border rounded mx-auto p-4 mt-4">
                <p>Username: <b>{{ $user[0]->username }}</b></p>
                <p>Email: <b>{{ $user[0]->email }}</b></p>
                <p>Tweets(posts): <b>{{ $user[0]->posts->count() }}</b></p>
                <p>Followers: <b>{{ $followers }}</b></p>
                <p>Following: <b>{{ $following }}</b></p>
                @if( $user[0]->id != Auth::id() )
                <button class="btn btn-primary btn-block" type="button">{{ $followCheck > 0 ? 'UnFollow' : 'Follow' }}</button>
                @endif
            </div>
        </div>
        <h3 class="text-center mt-4">Personal Posts</h3>

        @foreach($user[0]->posts->sortByDesc('created_at') as $post)
        <div class="row">
            <div class="col-md-6 mx-auto rounded border mt-4">
                <p>{{ $post->body }}</p>
                <p>{{ $user[0]->username }} <span>{{ $post->created_at }}</span></p>
            </div>
        </div>
        @endforeach

    </div>

@endsection