<html>
<head>
    <title>@yield('title', 'My Website')</title>
</head>
<body>
    @include('partials.navbar')

    <div class="container">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>
