<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blade Example</title>
</head>
<body>

    {{-- This is a Blade comment. It won't appear in HTML source --}}

    <!-- This is a regular HTML comment. It WILL appear in the browser source -->

    <h1>Welcome, {{ $name }}!</h1>

    {{-- Conditional Rendering --}}
    @if($isLoggedIn)
        <p>You are logged in.</p>
    @else
        <p>Please log in to continue.</p>
    @endif

    {{-- Looping --}}
    <h2>Your Skills:</h2>
    <ul>
        @foreach($skills as $skill)
            <li>{{ $skill }}</li>
        @endforeach
    </ul>

    {{-- Inline PHP (not recommended unless necessary) --}}
    @php
        $year = date('Y');
        $message = "Current Year: $year";
    @endphp

    <p>{{ $message }}</p>

    {{-- Running raw PHP (only for quick logic, better to avoid) --}}
    <?php
        echo "<p>This is plain PHP code output: Hello from PHP!</p>";
    ?>

    {{-- Escaped and Unescaped Output --}}
    <p>Escaped: {{ '<strong>Not bold</strong>' }}</p>
    <p>Unescaped: {!! '<strong>This will be bold</strong>' !!}</p>

    {{-- Including another Blade view --}}
    @include('footer')

</body>
</html>
