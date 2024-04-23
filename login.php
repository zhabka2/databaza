<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .register-link {
            text-align: center;
            margin-top: 10px;
        }
        .register-link a {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Login</h1>
        <?php
        session_start();
        if(isset($_SESSION['username'])) {
            header("Location: profile.php");
            exit;
        }

        if($_SERVER["REQUEST_METHOD"] == "POST") {
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

            $username = $_POST['username'];
            $password = $_POST['password'];

            // Overenie používateľa v databáze
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = $conn->query($sql);

            if($result->num_rows == 1) {
                $_SESSION['username'] = $username;
                header("Location: profile.php");
                exit;
            } else {
                echo "<p class='message'>Invalid username or password!</p>";
            }

            $conn->close();
        }
        ?>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <div class="register-link">
            <p>Don't have an account? <a href="index.php">Register</a></p>
        </div>
    </div>
</body>
</html>
