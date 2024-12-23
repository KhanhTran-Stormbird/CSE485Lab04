<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Borrow Details</h1>
        <p><strong>Reader:</strong> <?= $borrow->reader_name ?></p>
        <p><strong>Book:</strong> <?= $borrow->book_name ?></p>
        <p><strong>Borrow Date:</strong> <?= $borrow->borrow_date ?></p>
        <p><strong>Return Date:</strong> <?= $borrow->return_date ?></p>
        <p><strong>Status:</strong> <?= $borrow->status ?></p>
        <a href="index.php" class="btn btn-secondary">Back to Borrow List</a>
    </div>
</body>
</html>
