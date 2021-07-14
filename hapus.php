<?php  
    require "functions.php";

    $id = $_GET["id"];

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    
    var_dump(mysqli_affected_rows($conn));
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>
                    alert('Data berhasil dihapus');
                    window.location.href = 'index.php';
                </script>";
    }else {
        echo "<script>
                    alert('Data gagal dihapus');
                    window.location.href = 'index.php';
                </script>";
    }
?>