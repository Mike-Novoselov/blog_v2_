@extends('layouts.layout')

@section('title', 'User Details')

@section('content')
    <h1>User Details</h1>

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" value="{{ $user->name }}" disabled>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" value="{{ $user->email }}" disabled>
    </div>

    <a href="{{ url('/users') }}" class="btn btn-secondary">Back</a>
@endsection
