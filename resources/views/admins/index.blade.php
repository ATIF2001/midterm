@extends('layouts.app')
@section('content')
<h2>Admins</h2>
<a href="{{ route('admins.create') }}">Create New Admin</a>
<table>
    <thead>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
        <tr>
            <td>{{ $admin->id }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>
                <a href="{{ route('admins.edit', $admin->id) }}">Edit</a>
                <form method="POST" action="{{ route('admins.destroy', $admin->id) }}">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
