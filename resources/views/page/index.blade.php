@extends('layouts.app')

@section('content')
    <section>
        <div class="container mt-5">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{asset($post->img)}}" class="card-img-top" alt="Image 1">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <div class="media">
                                <img src="{{ asset('assets/img/profile.png') }}" alt="Profile Picture" width="30"
                             class="rounded-circle">
                                <div class="media-body">
                                    <p class="mb-0">{{auth()->user()->firstName}} {{auth()->user()->lastName}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
