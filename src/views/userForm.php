<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h1>Create a new user</h1>
    <form action="saveUser.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <button type="submit">Create User</button>
        <br>
        <a href="../listUsers.php">List of users</a>
    </form>
</body>
</html>
