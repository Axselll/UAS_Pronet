<?php
	session_start();
	if ( !isset($_SESSION["login"]) ) {
        header("Location: index.php");
		exit;
    }

	require "func_data_admin.php";

    if( isset($_POST["submit"]) ) {
        if (registrasi($_POST) > 0 ) {
            echo "<script>
                alert('Berhasil')
                document.location.href = 'data_administrator.php'
            </script>";
        } else {
            echo "<script>
                alert('Gagal')
                document.location.href = 'data_administrator.php'
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Input Data Admin</title>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<div class="container">
			<header class="head">
				<h1>Input Data Administrator</h1>
			</header>
			<div class="back-button">
				<a href="data_administrator.php">
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
					<span>Username :</span>
					<input type="text" name="username" />
				</label>
				<label>
					<span>Password :</span>
					<input type="password" name="password" />
				</label>
				<label>
					<span>Konfirmasi Password</span>
					<input type="password" name="password2" />
				</label>
				<button type="submit" name="submit">Submit</button>
			</form>
		</div>
	</body>
</html>
