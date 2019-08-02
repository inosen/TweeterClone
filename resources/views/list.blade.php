@extends('layouts.main')

@section('content')
    @include('includes.navigation')

    <div class="container">
    <h3 class="text-center">All TweeterClone Registered Users!</h3>

    @foreach($users as $user)
    @if( $user->id != Auth::id() )
        <div class="row">
            <div class="col-md-6 border rounded mx-auto p-4 mt-4">
                <p>Username: <b><a href="profile/{{ $user->username }}">{{ $user->username }}</a></b></p>
                <p>Tweets(posts): <b>{{ $user->posts->count() }}</b></p>
                <p>Followers: <b>{{ $user->followers }}</b></p>
                <p>Following: <b>{{ $user->following }}</b></p>
                <form action="{{ $user->followCheck > 0 ? route('unfollow') : route('follow') }}" method="post">@csrf
                    <input type="hidden" name="follow_id" value="{{ $user->id }}">
                    <input type="hidden" name="username" value="{{ $user->username }}">
                    <button class="btn btn-primary btn-block" type="submit">{{ $user->followCheck > 0 ? 'UnFollow' : 'Follow' }}</button>
                </form>
            </div>
        </div>
        @endif
        @endforeach
        
    </div>

@endsection