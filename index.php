<?php 
    require "functions.php";

    if(isset($_POST["search"])){
        $keyword = $_POST["keyword"];
        $mahasiswa = query("SELECT * FROM mahasiswa WHERE
                    nama LIKE '%$keyword%'OR 
                    nrp LIKE '%$keyword%' OR 
                    email LIKE '%$keyword%'OR 
                    jurusan LIKE '%$keyword%'
                    ");
        // var_dump($mahasiswa); die;
    }else{
        $mahasiswa = query("SELECT * FROM mahasiswa");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <h2><a href="add.php">Tambah mahasiswa!</a></h2>

    <form action="" method="POST">
        <input type="text" placeholder="enter keyword . . ."
        autofocus name="keyword">
        <button type="submit" name="search">search</button>
    </form>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>NRP</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $count = 1; ?>
        <?php foreach($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $count ;?></td>
                <td>
                    <a href="edit.php?id=<?= $mhs["id"] ;?>">Edit</a> |
                    <a href="hapus.php?id=<?= $mhs["id"] ;?>"
                       onclick="return confirm('Are u sure?');">Delete</a>
                </td>
                <td>
                    <img src="img/<?= $mhs["gambar"] ;?>" width="100">
                </td>
                <td><?= $mhs["nama"] ;?></td>
                <td><?= $mhs["nrp"] ;?></td>
                <td><?= $mhs["email"] ;?></td>
                <td><?= $mhs["jurusan"] ;?></td>
            </tr>
            <?php $count++; ?>
        <?php endforeach; $count++;?>
    </table>
</body>
</html>