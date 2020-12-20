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
        $kategori_jemaat = htmlspecialchars($data["kategori_jemaat"]);

        $insert_query = "INSERT INTO kategori_jemaat VALUES (
            '', '$id_jemaat', '$kategori_jemaat' )";
        mysqli_query($connection, $insert_query);
        return mysqli_affected_rows($connection);
    }

    function ubah($data){
        global $connection;
        $id_kategori_jemaat = $data["id_kategori_jemaat"];
        $id_jemaat = htmlspecialchars($data["id_jemaat"]);
        $kategori_jemaat = htmlspecialchars($data["kategori_jemaat"]);

        $update_query = "UPDATE kategori_jemaat SET
            id_jemaat = '$id_jemaat',
            kategori_jemaat = '$kategori_jemaat'
            WHERE id_kategori_jemaat = $id_kategori_jemaat
        ";
        mysqli_query($connection, $update_query);
        return mysqli_affected_rows($connection);
    }

    function hapus($id_kategori_jemaat){
        global $connection;
        mysqli_query($connection, "DELETE FROM kategori_jemaat WHERE id_kategori_jemaat = $id_kategori_jemaat");
        return mysqli_affected_rows($connection);
    }
?>