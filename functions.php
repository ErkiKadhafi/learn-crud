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

    function upload($dataFiles){
        // cek ada file yang diupload apa ngga
        if($dataFiles["gambar"]["error"] == 4){
            echo
            "<script>
            alert('Tolong pilih file foto');
            </script>";
            
            return false;
        }
        
        // extension valid
        $extValid = ["jpg", "png", "jpeg"];

        $extFile = explode(".", $dataFiles["gambar"]["name"]);
        $extFile = end($extFile);
        $ukuran = $dataFiles["gambar"]["size"];
        $tempName = $dataFiles["gambar"]["tmp_name"];

        //cek apakah yang diupload itu gambar
        if(!in_array($extFile, $extValid)){
            echo
                "<script>
                    alert('Tolong pilih file jpg/png/jpeg');
                </script>";
            return false;
        }
        
        //cek ukuran file
        if($ukuran > 1000000){
            echo
                "<script>
                alert('Ukuran file terlalu besar');
                </script>";
            return false;
        }
        
        //biar nama fotonya unique anjay
        $newName = uniqid();
        $newName .= "." . $extFile;
        
        move_uploaded_file($tempName, "img/$newName");
        // var_dump($newName); die;
        return $newName;
    }

    function add($data, $dataFiles){
        global $conn;
        
        $nama = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        $gambar = upload($dataFiles);

        if(!$gambar){
            return false;
        }

        mysqli_query($conn, "INSERT INTO mahasiswa VALUES
                    ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')");
    
        return mysqli_affected_rows($conn);
    }

    function edit($data, $dataFiles, $id){
        global $conn;

        $nama = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]) ;
        
        //cek doi ngupdate gambar ga
        if($dataFiles["gambar"]["error"] === 4){
            $gambar = $gambarLama;
        }else{
            $gambar = upload($dataFiles);
            if(!$gambar){
                return false;
            }
        }
        
        mysqli_query($conn, "UPDATE mahasiswa SET
                    nama = '$nama',
                    nrp = '$nrp',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar' 
                    WHERE id = $id");
    
        // var_dump($dataFiles); die;
        return mysqli_affected_rows($conn);
    }

?>