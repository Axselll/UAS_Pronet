<?php
    session_start();
	if ( !isset($_SESSION["login"]) ) {
        header("Location: index.php");
		exit;
	}

    require "func_data_kategori_jemaat.php";
    $id_kategori_jemaat = $_GET["id_kategori_jemaat"];
    if (hapus($id_kategori_jemaat) > 0) {
        echo "<script>
                alert('Berhasil')
                document.location.href = 'data_kategori_jemaat.php'
            </script>";
    } else {
        echo "<script>
                alert('Berhasil')
                document.location.href = 'data_kategori_jemaat.php'
            </script>";
    }
?>