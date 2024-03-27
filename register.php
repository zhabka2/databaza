<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection details
    $servername = "localhost";
    $db_username = "Denys";
    $db_password = "1234";
    $dbname = "lysenko3a2";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO zhabka (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password_hash);

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Set parameters and execute
    $stmt->execute();

    echo "Registration successful!";

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="body.css">
</head>
<body>

<form action="register.php" method="post">
    <input type="text" name="username" placeholder="Username" required autofocus><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" name="register" value="Register">
</form>

</body>
</html>
