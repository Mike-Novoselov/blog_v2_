@extends('layouts.layout')

@section('title', 'Users List')

@section('content')
    <h1>Users List</h1>
    <a href="{{ url('/users/create') }}" class="btn btn-primary mb-3">Create New User</a>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ url('/users/' . $user->id) }}" class="btn btn-info">View</a>
                    <a href="{{ url('/users/' . $user->id . '/edit') }}" class="btn btn-warning">Edit</a>
                    <form action="{{ url('/users/' . $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
