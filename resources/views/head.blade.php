<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            padding-top: 60px;
        }
        .navbar-brand {
            font-weight: bold;
        }
        iframe {
            width: 100%;
            height: 500px;
            border: none;
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Learn Laravel - Admin CRUD App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admins.index') }}">Admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/testView') }}">LearnBlade</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/create-user-profile') }}">UserRoutes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')

        <!-- Embedded YouTube Playlist -->
        <div class="mt-4">
            <h4 class="mb-3">Laravel Course Playlist</h4>
            <iframe 
                src="https://www.youtube.com/embed/videoseries?list=PL0b6OzIxLPbz7JK_YYrRJ1KxlGG4diZHJ" 
                allow="autoplay; encrypted-media" 
                allowfullscreen>
            </iframe>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-light py-4 mt-5 border-top">
        <div class="container text-center">
            <small>&copy; {{ date('Y') }} Admin test. All rights reserved.</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
