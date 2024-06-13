

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logged in</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
        text-align: center;
    }
    
    .welcome-message {
        font-size: 24px;
        margin-top: 50px;
    }
    
    .logout-link {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
    }
    
    .logout-link:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<?php
session_start(); //otvorenie session
//zistenie či je session nastavené
if(isset($_SESSION['username'])) {
    echo '<div class="welcome-message">Welcome '.$_SESSION['username'].'</div>';
    echo '<div>Click here to <a class="logout-link" href="logout.php" title="Logout">logout</a>.</div>'; //odkaz na odhlásenie
}
?>

</body>
</html>
