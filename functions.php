<?php 
    //buat koneksi ke db
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    //buat query
    function query($string){
        global $conn;

        $result = mysqli_query($conn, $string);
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        // var_dump($rows); die;
        return $rows;
    }

    function add($data){
        global $conn;
        
        $nama = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);

        mysqli_query($conn, "INSERT INTO mahasiswa VALUES
                    ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')");
    
        return mysqli_affected_rows($conn);
    }

    function edit($data, $id){
        global $conn;

        $nama = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);

        mysqli_query($conn, "UPDATE mahasiswa SET
                    nama = '$nama',
                    nrp = '$nrp',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar' 
                    WHERE id = $id");
    
        return mysqli_affected_rows($conn);
    }
    // var_dump($rows); 

?>