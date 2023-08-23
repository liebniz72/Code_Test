@extends('layouts.app') <!-- Use a layout if you have one -->

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Blog Posts</h1>
    <form class="mb-4" action="{{ route('blog.index') }}" method="GET">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by title" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>
    <ul class="list-group">
        @foreach ($posts as $post)
            <li class="list-group-item">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->excerpt }}</p>
                <p class="font-italic">Author: {{ $post->user->name }}</p>
            </li>
        @endforeach
    </ul>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection
