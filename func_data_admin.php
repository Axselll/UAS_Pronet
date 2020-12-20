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

    function registrasi($data) {
        global $connection;
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($connection, $data["password"]);
        $password2 = mysqli_real_escape_string($connection, $data["password2"]);

        $result = mysqli_query($connection, "SELECT username FROM administrator WHERE
        username = '$username'");
        if( mysqli_fetch_assoc($result) ) {
            echo "<script>
                alert('pilih username lain');
            </script>";
            return false;
        }

        if( $password !== $password2) { 
            echo "<script>
                alert('konfirmasi password tidak sesuai');
            </script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($connection, "INSERT INTO administrator VALUES (
            '', '$username', '$password')");
            return mysqli_affected_rows($connection);
    }

    function hapus($id_admin){
        global $connection;
        mysqli_query($connection, "DELETE FROM administrator WHERE id_admin = $id_admin");
        return mysqli_affected_rows($connection);
    }
?>