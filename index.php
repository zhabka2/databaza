<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="body.css">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            width: 300px;
            margin: 50px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h2>Registration</h2>
<form action="index.php" method="post">
    <input type="text" name="reg_username" placeholder="Username" required><br>
    <input type="password" name="reg_password" placeholder="Password" required><br>
    <input type="submit" name="register" value="Register">
</form>
      </body>

<?php
   session_start();   //otvorenie session
   
    //kontrola ci uz bol potvrdeny formular a ci boli vyplnene obidva udaje aj username aj password
   if (isset($_POST['login']) && !empty($_POST['username']) 
      && !empty($_POST['password'])) {

        //connect string do DB
        $servername = "localhost";
        $username = "Denys";
        $password = "1234";
        $dbname = "lysenko3a2";

        // Create connection

        
        $conn = new mysqli($servername, $username, 
            $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        //echo "Connected successfully";

        //vyber hesla z DB podla usera, ktory sa prihlasuje
        $sql = "SELECT password FROM zhabka where username ='".$_POST['username']."'";
        $result = $conn->query($sql);

        //ak vrati select viac ako 0 riadkov, user existuje
        if ($result->num_rows > 0) {
          // output data of each row
          $row = $result->fetch_assoc();
          if($row["password"]==$_POST['password']) {
            //if(password_verify($_POST['password'],$row["password"])) {
                $_SESSION['valid'] = true; //ulozenie session
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = $_POST['username'];

                //presmerovanie na dalsiu stranku
                header("Location: welcome.php", true, 301);
                exit();
          } else {
            echo "wrong password";
          }
        } else {
          echo "wrong username";
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
          $reg_username = $_POST['reg_username'];
          $reg_password = $_POST['reg_password'];
      
          // Hash the password
          $hashed_password = password_hash($reg_password, PASSWORD_DEFAULT);
      
          // Insert new user into the database
          $sql = "INSERT INTO zhabka (username, password) VALUES ('$reg_username', '$hashed_password')";
      
          if ($conn->query($sql) === TRUE) {
              echo "Registration successful!";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
      }
    
    $conn->close();
   
}     
            
   //formular            
   echo '<html>';
   echo '<head>';
   echo '<title>Login form</title>';
   echo '</head>';
   echo '<body>';
   echo '<form action = "index.php" method = "post">';
   echo '<input type = "text" name = "username" placeholder = "username" required autofocus></br>';
   echo '<input type = "password" name = "password" placeholder = "password" required>';
   echo '<input type = "submit" name="login">';
   echo '</form>';
   echo '</html>';
           
?>