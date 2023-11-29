<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <title>User List</title>
</head>

<body>
    <?php include_once "templates/layout.php"; ?>

    <h1>User List</h1>
    <ul>
        <?php foreach ($users as $user) : ?>
            <li>
                <a href="/index.php?action=show&id=<?= $user['id'] ?>">
                    <?= $user['username'] ?>
                </a>
                | <a href="/index.php?action=update&id=<?= $user['id'] ?>">Edit</a>
                | <a href="/index.php?action=delete&id=<?= $user['id'] ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/index.php?action=create">Add User</a>
</body>

</html>