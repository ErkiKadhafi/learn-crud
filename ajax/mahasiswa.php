<?php 
    require "../functions.php";
    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM mahasiswa WHERE 
            nama LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";
    $mahasiswa = query($query);
?>

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