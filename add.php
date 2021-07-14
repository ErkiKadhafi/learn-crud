<?php 
    //buat session
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    
    require "functions.php";
    if(isset($_POST["submit"])){
        if(add($_POST, $_FILES) > 0){
            echo
                "<script>
                    alert('Data berhasil ditambahkan');
                    window.location.href = 'index.php';
                </script>";
            exit;
        } else{
            echo
            "<script>
                alert('Data gagal ditambahkan');
            </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <style>
        label{
            display: block;
        }
        li{
            margin: 0 0 15px 0;
        }
    </style>
</head>
<body>
    <h1>Form Tambah Mahasiswa</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="nrp">nrp: </label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan">Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>