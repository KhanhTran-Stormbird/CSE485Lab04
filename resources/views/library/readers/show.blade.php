@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reader Details</h1>
        <p><strong>Name:</strong> {{ $reader->name }}</p>
        <p><strong>Birthday:</strong> {{ $reader->birthday }}</p>
        <p><strong>Address:</strong> {{ $reader->address }}</p>
        <p><strong>Phone:</strong> {{ $reader->phone }}</p>
        <a href="{{ route('readers.index') }}" class="btn btn-secondary">Back to Reader List</a>
    </div>
@endsection
