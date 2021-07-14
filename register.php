<?php 
    //buat session
    session_start();
    if(isset($_SESSION["login"])){
        if($_SESSION["login"] == true){
            header("Location: index.php");
        }
    }

    require "functions.php";

    if(isset($_POST["register"])){
        if(register($_POST) > 0){
            header("Location: index.php");
            $_SESSION["login"] = true;
        }else{
            $error = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <style>
        label{
            display: block;
        }
        li{
            margin: 0 0 10px 0;
        }
        h3{
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Halaman Register</h1>
     
    <?php if(isset($error)) : ?>
        <h3>Password atau username salah !</h3>
    <?php endif; ?>

    <h3><a href="login.php">login</a></h3>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirmasi Password: </label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">register</button>
            </li>
        </ul>
    </form>
</body>
</html>