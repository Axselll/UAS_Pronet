<?php
    session_start();
	if ( !isset($_SESSION["login"]) ) {
        header("Location: index.php");
		exit;
	}

    require "func_data_admin.php";
    $id_admin = $_GET["id_admin"];
    if (hapus($id_admin) > 0) {
        echo "<script>
                alert('Berhasil')
                document.location.href = 'data_administrator.php'
            </script>";
    } else {
        echo "<script>
                alert('Berhasil')
                document.location.href = 'data_administrator.php'
            </script>";
    }
?>