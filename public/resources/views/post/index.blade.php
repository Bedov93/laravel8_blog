@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-3">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <a class="btn btn-success" href="{{ route('post.create') }}" title="Create a product"> <i class="fas fa-plus-circle"></i>
                        Create a product
                    </a>
                </div>
            </div>
        </div>
        <div class="row m-3">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {!! $posts->onEachSide(0)->links() !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-responsive-lg">
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                <img src="{{ strstr($post->image, "://") == true ? $post->image : asset('storage/'. $post->image) }}"
                                     width="150"></td>
                            <td>{{ Illuminate\Support\Str::of($post->description)->limit(64, ' ...') }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <form  onsubmit="return confirm('Delete this post?');" action="{{ route('post.destroy', $post) }}" method="POST">

                                    <a href="{{ route('post.show', $post) }}" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>

                                    <a href="{{ route('post.edit', $post) }}">
                                        <i class="fas fa-edit  fa-lg"></i>
                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                        <i class="fas fa-trash fa-lg text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {!! $posts->onEachSide(0)->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
