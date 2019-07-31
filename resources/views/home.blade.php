@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <h4>Login</h4>
                <form action="{{ route('login') }}" method="post" class="mb-5">@csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input required class="form-control" type="text" id="username" name="username" value="{{ Request::old('username') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required class="form-control" type="password" id="password" name="password" value="{{ Request::old('password') }}">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <h4>Register</h4>
                <form action="{{ route('register') }}" method="post">@csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input required class="form-control" type="text" id="email" name="email" value="{{ Request::old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input required class="form-control" type="text" id="username" name="username" value="{{ Request::old('username') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required class="form-control" type="password" id="password" name="password" value="{{ Request::old('password') }}">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
