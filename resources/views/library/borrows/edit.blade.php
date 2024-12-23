@extends('library.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Borrow</h1>
        <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="reader_id" class="form-label">Reader</label>
                <select name="reader_id" class="form-select" required>
                    @foreach ($readers as $reader)
                        <option value="{{ $reader->id }}" {{ $borrow->reader_id == $reader->id ? 'selected' : '' }}>
                            {{ $reader->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="book_id" class="form-label">Book</label>
                <select name="book_id" class="form-select" required>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ $borrow->book_id == $book->id ? 'selected' : '' }}>
                            {{ $book->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="borrow_date" class="form-label">Borrow Date</label>
                <input type="date" class="form-control" id="borrow_date" name="borrow_date" value="{{ $borrow->borrow_date }}" required>
            </div>
            <div class="mb-3">
                <label for="return_date" class="form-label">Return Date</label>
                <input type="date" class="form-control" id="return_date" name="return_date" value="{{ $borrow->return_date }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="0" {{ $borrow->status == 0 ? 'selected' : '' }}>Borrowed</option>
                    <option value="1" {{ $borrow->status == 1 ? 'selected' : '' }}>Returned</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
