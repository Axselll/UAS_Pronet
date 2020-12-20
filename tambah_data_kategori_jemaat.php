<?php
	session_start();
	if ( !isset($_SESSION["login"]) ) {
        header("Location: index.php");
		exit;
    }

	require "func_data_kategori_jemaat.php";

    if( isset($_POST["submit"]) ) {
        if (tambah($_POST) > 0 ) {
            echo "<script>
                alert('Berhasil')
                document.location.href = 'data_kategori_jemaat.php'
            </script>";
        } else {
            echo "<script>
                alert('Gagal')
                document.location.href = 'data_kategori_jemaat.php'
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Input Data Kategori Jemaat</title>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<div class="container">
			<header class="head">
				<h1>Input Data Kategori Jemaat</h1>
			</header>
			<div class="back-button">
				<a href="data_kategori_jemaat.php">
					&larr;
					<p>Back</p>
				</a>
			</div>
			<form
				class="input-card"
				action=""
				method="post"
				enctype="multipart/form-data"
			>
				<label>
					<span>ID Jemaat :</span>
					<input type="text" name="id_jemaat" />
				</label>
				<label>
					<span>Kategori Jemaat</span>
                    <select name="kategori_jemaat">
                        <option value="">Select...</option>
                        <option value="pkb">Persekutuan Bapak</option>
                        <option value="pw">Persekutuan Wanita</option>
                        <option value="pam">Persekutuan Anak Muda</option>
                        <option value="par">Persekutuan Anak & Remaja</option>
                    </select>
				</label>
				<button type="submit" name="submit">Submit</button>
			</form>
		</div>
	</body>
</html>
