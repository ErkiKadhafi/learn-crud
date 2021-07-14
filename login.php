<?php 
    require "functions.php";

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $row = mysqli_query($conn, "SELECT password FROM user WHERE username = '$username'");
        
        if($checkPass = mysqli_fetch_assoc($row)){
            if(password_verify($password, $checkPass["password"])){
                header("Location: index.php");
            }else{
                $error = 1;
            }
        }else{
            $error = 1;
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman login</title>
    <style>
        label{
            display: block;
        }
        li{
            margin: 0 0 15px 0;
        }
        h3{
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Halaman login</h1>
    
    <?php if(isset($error)) : ?>
        <h3>Password atau username salah !</h3>
    <?php endif; ?>  

    <h3><a href="register.php">register account</a></h3>

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
                <button type="submit" name="login">login</button>
            </li>
        </ul>
    </form>
</body>
</html>