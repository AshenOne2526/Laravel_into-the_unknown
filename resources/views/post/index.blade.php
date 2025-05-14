@extends('layouts.main')

@section('content')
    <!-- Hero Section -->
    <section class="py-5 text-center bg-light mb-5">
        <div class="container">
            <h1 class="display-4 mb-3 fw-bold text-primary">Latest Posts</h1>
            <a href="{{ route('post.create') }}" class="btn btn-primary btn-lg mt-3">Create New Post</a>
        </div>
    </section>

    <!-- Posts Grid -->
    <div class="container">
        <div class="row g-4">
            @foreach ($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow rounded-4 overflow-hidden">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark mb-2">{{ $post->name }}</h5>
                            <p class="text-muted mb-3">Price: <span class="fw-semibold text-success">${{ number_format($post->price, 2) }}</span></p>
                            <p class="card-text text-muted flex-grow-1">Here’s a brief introduction to this post. It’s concise but inviting.</p>
                            <div class="mt-3">
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-outline-primary w-100 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->withQueryString()->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
