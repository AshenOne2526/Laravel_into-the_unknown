@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <!-- Page Title -->
        <div class="text-center mb-5">
            <h1 class="display-4 text-primary font-weight-bold">Latest Posts</h1>
        </div>

        <!-- Posts Grid -->
        <div class="row">
            @foreach ($Posts as $post)
                <div class="col-md-4 mb-4">
                    <!-- Post Card -->
                    <div class="card shadow-lg rounded-4 overflow-hidden">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-dark">{{ $post->name }}</h5>
                            <p class="card-text text-muted">Here’s a brief introduction to this post. It’s concise but inviting.</p>
                            <a class="btn btn-outline-primary btn-lg text-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
