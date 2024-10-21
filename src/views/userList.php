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
            }
        ?> 
    </ul>
    <a href="../index.php">Create New User</a>
</body>
</html>
