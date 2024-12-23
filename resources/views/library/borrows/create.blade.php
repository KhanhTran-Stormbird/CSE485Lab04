@extends('library.layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Borrow</h1>
        <form action="store.php" method="POST">
            <div class="mb-3">
                <label for="reader_id" class="form-label">Reader</label>
                <select class="form-control" id="reader_id" name="reader_id" required>
                    <?php foreach ($readers as $reader): ?>
                        <option value="<?= $reader->id ?>"><?= $reader->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="book_id" class="form-label">Book</label>
                <select class="form-control" id="book_id" name="book_id" required>
                    <?php foreach ($books as $book): ?>
                        <option value="<?= $book->id ?>"><?= $book->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="borrow_date" class="form-label">Borrow Date</label>
                <input type="date" class="form-control" id="borrow_date" name="borrow_date" required>
            </div>
            <div class="mb-3">
                <label for="return_date" class="form-label">Return Date</label>
                <input type="date" class="form-control" id="return_date" name="return_date">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
