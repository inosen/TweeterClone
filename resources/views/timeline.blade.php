@extends('layouts.main')

@section('content')
    @include('includes.navigation')

    <div class="container">
        
        <h3 class="text-center">{{ Auth::user()->username }} is following the below users...</h3>

        @if($following_ids->count() > 0)
        
            @foreach($post as $pst)
                <div class="row">
                    <div class="col-md-6 mx-auto rounded border mt-4">
                        @if($pst->image != null)
                        <img src="{{ asset('postImages/'.$pst->image) }}" width="500px" alt="post image">
                        @endif
                        <p>{{ $pst->body }}</p>
                        <p><img src="{{ asset('avatarImages/'.$pst->user->image) }}" width="50px" alt="profile image"><a href="profile/{{ $pst->user->username }}">{{ $pst->user->username }} </a><span>{{ $pst->created_at }}</span></p>
                    </div>
                </div>
            @endforeach
        
        @else
        <h6 class="text-center mt-3 alert alert-danger">Sorry ..there are no posts to show because you are not following someone yet... :(</h6>
        @endif
    </div>

@endsection