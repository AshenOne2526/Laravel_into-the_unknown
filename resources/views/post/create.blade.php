@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1 class="display-4 text-primary text-center mb-4">Create a New Post</h1>

        <!-- Form for creating a post -->
        <form action="{{ route('post.store') }}" method="POST">
            @csrf <!-- CSRF Token for protection -->
            
            <div class="form-group mb-4">
                <label for="name" class="form-label">Post Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter post name" required>
            </div>

            <div class="form-group mb-4">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" class="form-control" placeholder="Enter price" step="0.01" required>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-lg">Create Post</button>
            </div>
        </form>
    </div>
@endsection
