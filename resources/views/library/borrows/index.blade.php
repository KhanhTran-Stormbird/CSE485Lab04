<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Borrow List</h1>
        <a href="create.php" class="btn btn-primary mb-3">Add New Borrow</a>
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
                <?php foreach ($borrows as $borrow): ?>
                    <tr>
                        <td><?= $borrow->id ?></td>
                        <td><?= $borrow->reader_name ?></td>
                        <td><?= $borrow->book_name ?></td>
                        <td><?= $borrow->borrow_date ?></td>
                        <td><?= $borrow->return_date ?></td>
                        <td><?= $borrow->status ?></td>
                        <td>
                            <a href="show.php?id=<?= $borrow->id ?>" class="btn btn-info">View</a>
                            <a href="edit.php?id=<?= $borrow->id ?>" class="btn btn-warning">Edit</a>
                            <form action="delete.php" method="POST" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?= $borrow->id ?>">
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
