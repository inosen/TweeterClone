<?php
//Custom Pagination Engine
$no_of_records_per_page = 2;
$total_rows = $users->count();
$total_pages = ceil($total_rows / $no_of_records_per_page);
$end = $page_id * $no_of_records_per_page;
$start = $end - $no_of_records_per_page + 1;
$users = $users->whereBetween('id',[$start, $end]);

?>

@extends('layouts.main')

@section('content')
    @include('includes.navigation')

    <div class="container">
    <h3 class="text-center">All TweeterClone Registered Users!</h3>

    @foreach($users as $user)
    @if( $user->id != Auth::id() )
        <div class="row">
            <div class="col-md-6 border rounded mx-auto p-4 mt-4">
                <img src="{{ asset('avatarImages/'.$user->image) }}" width="50px" alt="profile image">
                <p>Username: <b><a href="../profile/{{ $user->username }}">{{ $user->username }}</a></b></p>
                <p>Tweets(posts): <b>{{ $user->posts->count() }}</b></p>
                <p>Followers: <b>{{ $user->followers }}</b></p>
                <p>Following: <b>{{ $user->following }}</b></p>
                <form action="{{ $user->followCheck > 0 ? route('unfollow') : route('follow') }}" method="post">@csrf
                    <input type="hidden" name="follow_id" value="{{ $user->id }}">
                    <input type="hidden" name="username" value="{{ $user->username }}">
                    <input type="hidden" name="email" value="{{ $user->email }}">
                    <button class="btn btn-primary btn-block" type="submit">{{ $user->followCheck > 0 ? 'UnFollow' : 'Follow' }}</button>
                </form>
            </div>
        </div>
        @endif
        @endforeach
        
        <!-- Custom Pagination Controls -->
        <ul class="pagination">
            @if( $page_id != 1 )
            <li class="page-item"><a class="page-link" href="{{ $page_id - 1 }}">Previous</a></li>
            @endif
            @if( $page_id != $total_pages )
            <li class="page-item"><a class="page-link" href="{{ $page_id + 1 }}">Next</a></li>
            @endif
        </ul>

    </div>

@endsection