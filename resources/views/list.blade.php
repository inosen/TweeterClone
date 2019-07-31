@extends('layouts.main')

@section('content')
    @include('includes.navigation')

    <div class="container">
    <h3 class="text-center">All TweeterClone Registered Users!</h3>
    <div class="row">
            <div class="col-md-6 border rounded mx-auto p-4 mt-4">
                <p>Username: <b><a href="#">nestor</a></b></p>
                <p>Tweets(posts): <b>32</b></p>
                <p>Followers: <b>53</b></p>
                <p>Following: <b>11</b></p>
                <button class="btn btn-primary btn-block" type="button">Follow</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 border rounded mx-auto p-4 mt-4">
                <p>Username: <b><a href="#">nestor</a></b></p>
                <p>Tweets(posts): <b>32</b></p>
                <p>Followers: <b>53</b></p>
                <p>Following: <b>11</b></p>
                <button class="btn btn-primary btn-block" type="button">Follow</button>
            </div>
        </div>
    </div>

@endsection