<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <title>User Form</title>
</head>

<body>

    <?php include_once "templates/layout.php"; ?>
    <h1>User Form</h1>
    <form action="/index.php?action=<?= isset($user['id']) ? 'update&id=' . $user['id'] : 'create' ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?= isset($user['username']) ? $user['username'] : '' ?>" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= isset($user['email']) ? $user['email'] : '' ?>" required><br>

        <input type="submit" value="<?= isset($user) ? 'Update' : 'Create' ?>">
    </form>
    <a href="/index.php">Back to User List</a>
</body>

</html>