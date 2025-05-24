@extends('layouts.app')

<!-- Extending a part of a blade template -->

@section('title', 'Home Page')

<!-- this section content will goes into the yield keyword of the extended blade template -->

@section('content')

    <h1>Welcome Home</h1>
    <p>This is the home page content.</p>
@endsection

@section('scripts')
    <script>alert('Home page loaded');</script>
@endsection
 
<!-- Using alert Component Laravel will auto find it inside components folder -->
<x-alert>
    This is a danger message!
</x-alert>


<x-header>
</x-header>
