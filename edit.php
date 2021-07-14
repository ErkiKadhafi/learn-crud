<?php
    //buat session
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    
    require "functions.php";

    $id = $_GET["id"];
    $mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
    // var_dump($mahasiswa);

    if(isset($_POST["submit"])){
        global $id;

        if(edit($_POST, $_FILES, $id) > 0){
            echo
                "<script>
                    alert('Data berhasil diedit');
                    window.location.href = 'index.php';
                </script>";
            exit;
        } else{
            echo
            "<script>
                alert('Data gagal diedit');
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
    <title>Edit Mahasiswa</title>
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
    <h1>Form Edit Mahasiswa</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="gambarLama" value="<?= $mahasiswa["gambar"] ;?>">
        <ul>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama"
                    value="<?= $mahasiswa["nama"] ;?>">
            </li>
            <li>
                <label for="nrp">nrp: </label>
                <input type="text" name="nrp" id="nrp" required
                value="<?= $mahasiswa["nrp"] ;?>">
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="text" name="email" id="email"
                value="<?= $mahasiswa["email"] ;?>">
            </li>
            <li>
                <label for="jurusan">Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan"
                value="<?= $mahasiswa["jurusan"] ;?>">
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <img src="img/<?= $mahasiswa["gambar"] ;?>" width="70">
                <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Edit</button>
            </li>
        </ul>
    </form>
</body>
</html>