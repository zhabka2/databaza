<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
        }
        .logout-link {
            margin-top: 20px;
        }
        .logout-link a {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
        <p>This is your welcome page.</p>
        <div class="logout-link">
            <p><a href="logout.php">Logout</a></p>
        </div>
    </div>
</body>
</html>
