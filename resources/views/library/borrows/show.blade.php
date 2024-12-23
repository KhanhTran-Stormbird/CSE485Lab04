@extends('library.layouts.app')

@section('content')
    <div class="container">
        <h1>Borrow Details</h1>
        <p><strong>Reader:</strong> <?= $borrow->reader_name ?></p>
        <p><strong>Book:</strong> <?= $borrow->book_name ?></p>
        <p><strong>Borrow Date:</strong> <?= $borrow->borrow_date ?></p>
        <p><strong>Return Date:</strong> <?= $borrow->return_date ?></p>
        <p><strong>Status:</strong> <?= $borrow->status ?></p>
        <a href="index.php" class="btn btn-secondary">Back to Borrow List</a>
    </div>
@endsection