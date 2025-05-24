@extends('layouts.app')
@section('content')
<h2>Create Admin</h2>
<form method="POST" action="{{ route('admins.store') }}">
    @csrf
    <input name="name" placeholder="Name" required>
    <input name="email" placeholder="Email" type="email" required>
    <input name="password" placeholder="Password" type="password" required>
    <button type="submit">Create</button>
</form>
@endsection
