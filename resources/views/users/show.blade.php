@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text">Email: {{ $user->email }}</p>
                
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit User</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete User</button>
            </form>
        </div>
    </div>
@endsection
