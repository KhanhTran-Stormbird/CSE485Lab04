<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Book Details</h1>
        <p><strong>Name:</strong> <?= $book->name ?></p>
        <p><strong>Author:</strong> <?= $book->author ?></p>
        <p><strong>Category:</strong> <?= $book->category ?></p>
        <p><strong>Year:</strong> <?= $book->year ?></p>
        <p><strong>Quantity:</strong> <?= $book->quantity ?></p>
        <a href="index.php" class="btn btn-secondary">Back to Book List</a>
    </div>
</body>
</html>
