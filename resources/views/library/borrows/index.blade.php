@extends('library.layouts.app')

@section('content')
    <div class="container">
        <h1>Borrow List</h1>
        <a href="{{ route('borrows.create') }}" class="btn btn-primary mb-3">Add New Borrow</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Reader</th>
                    <th>Book</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->id }}</td>
                        <td>{{ $borrow->reader->name }}</td>
                        <td>{{ $borrow->book->name }}</td>
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->return_date }}</td>
                        <td>{{ $borrow->status ? 'Returned' : 'Borrowed' }}</td>
                        <td>
                            <a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('borrows.destroy', $borrow->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this borrow record?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
