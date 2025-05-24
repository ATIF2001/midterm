@extends('layouts.app')
@section('content')
<h2>Edit Admin</h2>
<form method="POST" action="{{ route('admins.update', $admin->id) }}">
    @csrf @method('PUT')
    <input name="name" value="{{ $admin->name }}" required>
    <input name="email" value="{{ $admin->email }}" required>
    <input name="password" placeholder="New Password (optional)" type="password">
    <button type="submit">Update</button>
</form>
@endsection
