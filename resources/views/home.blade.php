@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <h1>Welcome Home</h1>
    <p>This is the home page content.</p>
@endsection

@section('scripts')
    <script>alert('Home page loaded');</script>
@endsection

<x-alert>
    This is a danger message!
</x-alert>


<x-header>
</x-header>
