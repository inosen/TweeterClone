@extends('layouts.main')

@section('content')
    @include('includes.navigation')

    <div class="container">
        <div class="row">
            <div class="col-md-6 border rounded mx-auto p-4 mt-4">
                <p>Username: <b>nestor</b></p>
                <p>Email: <b>miaritisnestor@gmail.com</b></p>
                <p>Tweets(posts): <b>32</b></p>
                <p>Followers: <b>53</b></p>
                <p>Following: <b>11</b></p>
                <button class="btn btn-primary btn-block" type="button">Follow</button>
            </div>
        </div>
        <h3 class="text-center mt-4">Personal Posts</h3>
        <div class="row">
            <div class="col-md-6 mx-auto rounded border mt-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Aperiam eligendi dicta ut rerum quam inventore quod nemo 
                amet temporibus vel repudiandae laudantium pariatur consequatur 
                quibusdam molestias, officiis ad illum assumenda!</p>
                <p><a href="#">nestor </a><span>2019-07-22 15:22:33</span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto rounded border mt-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Aperiam eligendi dicta ut rerum quam inventore quod nemo 
                amet temporibus vel repudiandae laudantium pariatur consequatur 
                quibusdam molestias, officiis ad illum assumenda!</p>
                <p><a href="#">nestor </a><span>2019-07-22 15:22:33</span></p>
            </div>
        </div>
    </div>

@endsection