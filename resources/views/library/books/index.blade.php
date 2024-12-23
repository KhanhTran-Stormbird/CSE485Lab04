<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Book List</h1>
        <a href="create.php" class="btn btn-primary mb-3">Add New Book</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Year</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= $book->id ?></td>
                        <td><?= $book->name ?></td>
                        <td><?= $book->author ?></td>
                        <td><?= $book->category ?></td>
                        <td><?= $book->year ?></td>
                        <td><?= $book->quantity ?></td>
                        <td>
                            <a href="show.php?id=<?= $book->id ?>" class="btn btn-info">View</a>
                            <a href="edit.php?id=<?= $book->id ?>" class="btn btn-warning">Edit</a>
                            <form action="delete.php" method="POST" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?= $book->id ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
