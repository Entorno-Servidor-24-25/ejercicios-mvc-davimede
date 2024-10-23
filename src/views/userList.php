<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User</title>
</head>
<body>
    <h1>List of users</h1>
    <ul> 
        <?php 
            foreach ($users as $user) {
                echo "<li>" . htmlspecialchars($user->name) . "</li>";
                echo "<form action='deleteUser.php' method='POST'>";
                echo "<input type='hidden' name='id' value='" . htmlspecialchars($user->id) . "'>";
                echo "<button type='submit'>delete</button>";
                echo "</form>";
            }
        ?>
    </ul>
    <a href="listUsers.php">Reload the page</a>
    <a href="../index.php">Create New User</a>
</body>
</html>