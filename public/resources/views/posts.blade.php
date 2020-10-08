@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-3">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <img class="card-img-top"
                             src="{{ strstr($post->image, "://") == true ? $post->image : asset('storage/'. $post->image) }}"
                             alt="Card image cap"
                             style="height: 50vh; object-fit: cover">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold"> {{ $post->title }}</h5>
                            <p class="card-text">{{ Illuminate\Support\Str::of($post->description)->limit(128, ' ...') }}</p>
                            <p class="card-text"><small class="text-muted">author</small> {{ $post->user->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
