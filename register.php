<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (!empty($username) && !empty($password)) {
        $sql = 'INSERT INTO users (username, password) VALUES (:username, :password)';
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute(['username' => $username, 'password' => $hashed_password])) {
            header('Location: login.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please fill in all fields!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <div class="form-container">
        <h2>Register</h2>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
        <div class="switch-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</div>
</body>
</html>
