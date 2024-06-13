<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            margin-top: 10px;
        }
        .profile {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
        }
        .profile p {
            margin: 5px 0;
        }
        .login-link {
            text-align: center;
            margin-top: 10px;
        }
        .login-link a {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Registration</h1>
        <?php
        // Pripojenie k databáze
        $servername = "localhost";
        $username = "Denys";
        $password = "1234";
        $dbname = "lysenko3a2";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Overenie pripojenia
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Spracovanie registrácie po odoslání formulára
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Vloženie používateľa do databázy
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='message'>Registration successful!</p>";
                echo "<div class='profile'>";
                echo "<h2>Your Profile</h2>";
                echo "<p><strong>Username:</strong> $username</p>";
                echo "<p><strong>Email:</strong> $email</p>";
                echo "</div>";
            } else {
                echo "<p class='message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }

        $conn->close();
        ?>
        <form action="index.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
