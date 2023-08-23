@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Post Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text">Author: {{ $post->user->name }}</p>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit Post</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Post</button>
            </form>
        </div>
    </div>
@endsection
