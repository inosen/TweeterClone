@extends('layouts.main')

@section('content')
    @include('includes.navigation')

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h4 class="text-center">Post a tweet!</h4>
                <form action="{{ route('save_post') }}" method="post">@csrf
                    <div class="form-group">
                        <textarea required class="form-control" name="post" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Post</button>
                </form>
            </div>
        </div>
        

    </div>

@endsection