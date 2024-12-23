@extends('library.layouts.app')

@section('content')
    <div class="container">
        <h1>Book Details</h1>
        <p><strong>Name:</strong> <?= $book->name ?></p>
        <p><strong>Author:</strong> <?= $book->author ?></p>
        <p><strong>Category:</strong> <?= $book->category ?></p>
        <p><strong>Year:</strong> <?= $book->year ?></p>
        <p><strong>Quantity:</strong> <?= $book->quantity ?></p>
        <a href="index.php" class="btn btn-secondary">Back to Book List</a>
    </div>
@endsection
