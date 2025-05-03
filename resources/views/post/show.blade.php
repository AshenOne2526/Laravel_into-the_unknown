@extends('layouts.main')

@section('content')
    <div class="container my-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="display-4 text-primary text-center mb-4">Post Details</h1>

        <div class="text-right mb-4">
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success">Edit This Post</a>
        </div>
        <div class="text-right mb-4">
            <form action="{{ route('post.delete', $post->id) }}" method="post">
                @csrf
                @method('delete')
                <input type='submit' value ='Delete This Post' class="btn btn-danger"/>
            </form>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $post->name }}</h5>
                <p class="card-text"><strong>Price:</strong> ${{ number_format($post->price, 2) }}</p>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('post.index') }}" class="btn btn-secondary btn-lg">Back to Posts</a>
        </div>
    </div>
@endsection
