@extends('layouts.main')

@section('content')
    <div class="hero-section">
        <h1>Latest Posts</h1>
        <a href="{{ route('post.create') }}" class="btn btn-primary">Create a New One</a>
    </div>

    <div class="container my-5">
        <!-- Posts Grid -->
        <div class="row">
            @foreach ($Posts as $post)
                <div class="col-md-4 mb-4">
                    <!-- Post Card -->
                    <div class="card shadow-sm rounded-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->name }}</h5>
                            <p class="card-text">Here’s a brief introduction to this post. It’s concise but inviting.</p>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-outline-success">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

