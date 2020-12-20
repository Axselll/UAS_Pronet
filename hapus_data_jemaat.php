<?php
    session_start();
	if ( !isset($_SESSION["login"]) ) {
        header("Location: index.php");
		exit;
	}

    require "func_data_jemaat.php";
    $id_jemaat = $_GET["id_jemaat"];
    if (hapus($id_jemaat) > 0) {
        echo "<script>
                alert('Berhasil')
                document.location.href = 'data_jemaat.php'
            </script>";
    } else {
        echo "<script>
                alert('Berhasil')
                document.location.href = 'data_jemaat.php'
            </script>";
    }
?>