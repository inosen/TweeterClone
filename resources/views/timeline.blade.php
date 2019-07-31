@extends('layouts.main')

@section('content')
    @include('includes.navigation')

    <div class="container">
        <h3 class="text-center">{{ Auth::user()->username }} is following the below users...</h3>
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