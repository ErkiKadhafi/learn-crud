<?php 
    require "functions.php";

    $id = $_GET["id"];
    $mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
    // var_dump($mahasiswa);

    if(isset($_POST["submit"])){
        if(edit($_POST, $id) > 0){
            echo
                "<script>
                    alert('Data berhasil diedit');
                    window.location.href = 'index.php';
                </script>";
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
    <form action="" method="POST">
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
                <input type="text" name="gambar" id="gambar"
                value="<?= $mahasiswa["gambar"] ;?>">
            </li>
            <li>
                <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>