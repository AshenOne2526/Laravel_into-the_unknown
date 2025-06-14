<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Into the Unknown</title>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand mx-auto" href="{{ route('post.index') }}">Into the Unknown</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="{{ route('post.index') }}">Post</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="{{ route('about.index') }}">About</a>
                    </li>
                    @can('view',auth()->user())
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="{{ route('admin.post.index') }}">Admin panel</a>
                        </li>
                    @endcan
                </ul>
            </div>            
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-center text-white py-4 mt-auto">
        <p>© 2025 Into the Unknown. All rights reserved.</p>
    </footer>
</body>
</html>
