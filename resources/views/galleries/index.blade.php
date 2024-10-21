@extends('layouts.main')

@section('content')
    <h1>Gallery for {{ $user->name }}</h1>

    <a href="{{ route('galleries.create', $user->id) }}">Add New Image</a>

    <ul>
        @foreach($galleries as $gallery)
            <li>
                <img src="{{ $gallery->image_path }}" alt="Gallery Image" width="100">
                <form action="{{ route('galleries.destroy', [$user->id, $gallery->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
