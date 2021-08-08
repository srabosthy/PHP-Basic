<?php
    session_start();
    if(!$_SESSION['username']){
        session_unset();
        header("Locaton: ./login.php");
    }
    else if($_SESSION['username'] && $_SESSION['$role'] != 'employee'){
        session_unset();
        header("Locaton: ./adminHome.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Home</title>
</head>
<body>
    <a  href="./logout.php">ddd</a>
    <h1>Welcome Chesra Mohsin</h1>
</body>
</html>