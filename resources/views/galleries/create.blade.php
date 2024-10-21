@extends('layouts.main')

@section('content')
    <h1>Add Image for {{ $user->name }}</h1>

    <form action="{{ route('galleries.store', $user->id) }}" method="POST">
        @csrf
        <label for="image_path">Image Path:</label>
        <input type="text" name="image_path" required>

        <button type="submit">Add Image</button>
    </form>
@endsection
