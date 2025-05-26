@if (!session('user_id'))
    <script>window.location.href = "/login";</script>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 70px;
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
            letter-spacing: 1px;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            margin-left: 15px;
            transition: 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            text-decoration: underline;
        }

        .container h4 {
            font-weight: 600;
            color: #333;
        }

        iframe {
            width: 100%;
            height: 500px;
            border-radius: 8px;
            border: none;
        }

        footer {
            background: #343a40;
            color: #ccc;
        }

        footer small {
            color: #aaa;
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-laptop-code me-2"></i>Laravel Admin CRUD
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admins.index') }}">Admins</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/testView') }}">LearnBlade</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/create-user-profile') }}">UserRoutes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')

        <!-- Embedded Playlist -->
        <div class="mt-5">
            <h4 class="mb-3">Laravel Course Playlist</h4>
            <iframe 
                src="https://www.youtube.com/embed/videoseries?list=PL0b6OzIxLPbz7JK_YYrRJ1KxlGG4diZHJ"
                allow="autoplay; encrypted-media"
                allowfullscreen>
            </iframe>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-4 mt-5 border-top">
        <div class="container text-center">
            <small>&copy; {{ date('Y') }} Learn Laravel Admin Panel. All rights reserved.</small>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
