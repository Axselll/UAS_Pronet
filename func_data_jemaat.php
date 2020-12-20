<?php 
    $connection = mysqli_connect("localhost", "root", "lolilol2500", "gereja");

    function query($query) {
        global $connection;
        $result = mysqli_query($connection, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $connection;
        $id_jemaat = htmlspecialchars($data["id_jemaat"]);
        $nama_jemaat = htmlspecialchars($data["nama_jemaat"]);
        $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
        $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);

        $foto = upload();
        if (!$foto) {
            return false;
        }

        $insert_query = "INSERT INTO jemaat VALUES (
            '$id_jemaat', '$nama_jemaat', '$jenis_kelamin', '$tanggal_lahir', '$foto'
        )";
        mysqli_query($connection, $insert_query);
        return mysqli_affected_rows($connection);
    }

    function upload(){
        $nama_file = $_FILES['foto']['name'];
        $ukuran_file = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $penyimpanan_sementara = $_FILES['foto']['tmp_name'];

        if ( $error === 4) {
            echo "<script>
                alert('upload file terlebih dahulu');
            </script>";
            return false;
        }

        $ekstensi = ['jpg', 'jpeg', 'png'];
        $ekstensi_gambar = explode('.', $nama_file);
        $ekstensi_gambar = strtolower(end($ekstensi_gambar));
        if ( !in_array($ekstensi_gambar, $ekstensi) ) {
            echo "<script>
                alert('upload foto terlebih dahulu');
            </script>";
            return false;
        }

        if ($ukuran_file > 5000000) {
            echo "<script>
                alert('ukuran foto terlalu besar');
            </script>";
            return false;
        }

        $nama_file_baru = uniqid();
        $nama_file_baru .= '.';
        $nama_file_baru .= $ekstensi_gambar;
        move_uploaded_file($penyimpanan_sementara, 'img/' . $nama_file_baru);
        return $nama_file_baru;
    }

    function ubah($data){
        global $connection;
        $id_jemaat = $data["id_jemaat"];
        $nama_jemaat = htmlspecialchars($data["nama_jemaat"]);
        $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
        $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
        $foto_lama = htmlspecialchars($data["foto_lama"]);

        if ($_FILES['foto']['error'] === 4) {
            $foto = $foto_lama;
        } else {
            $foto = upload();
        }

        $update_query = "UPDATE jemaat SET
            nama_jemaat = '$nama_jemaat',
            jenis_kelamin = '$jenis_kelamin',
            tanggal_lahir = '$tanggal_lahir',
            foto = '$foto'
            WHERE id_jemaat = $id_jemaat
        ";
        mysqli_query($connection, $update_query);
        return mysqli_affected_rows($connection);
    }

    function hapus($id_jemaat){
        global $connection;
        mysqli_query($connection, "DELETE FROM jemaat WHERE id_jemaat = $id_jemaat");
        return mysqli_affected_rows($connection);
    }
?>