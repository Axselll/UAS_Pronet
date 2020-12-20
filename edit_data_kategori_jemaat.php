<?php
	session_start();
	if ( !isset($_SESSION["login"]) ) {
        header("Location: index.php");
		exit;
	}

    require "func_data_kategori_jemaat.php";
    $id = $_GET['id_kategori_jemaat'];
    $data = query("SELECT * FROM kategori_jemaat WHERE id_kategori_jemaat = $id")[0];

    if( isset($_POST["submit"]) ) {
        if (ubah($_POST) > 0 ) {
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
		<title>Edit Data Kategori_Jemaat</title>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<div class="container">
			<header class="head">
				<h1>Edit Data Kategori Jemaat</h1>
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
			<input type="hidden" name="id_kategori_jemaat" value="<?php echo $data['id_kategori_jemaat'] ?>">
				<label>
					<span>ID Jemaat :</span>
					<input type="text" name="id_jemaat" value="<?php echo $data['id_jemaat'] ?>"/>
				</label>
				<label>
					<span>Kategori Jemaat</span>
                    <select name="kategori_jemaat">
                        <option value="">Select...</option>
                        <option <?php if ($data['kategori_jemaat'] == "pkb" ) echo 'selected' ; ?> value="pkb">Persekutuan Bapak</option>
                        <option <?php if ($data['kategori_jemaat'] == "pw" ) echo 'selected' ; ?> value="pw">Persekutuan Wanita</option>
                        <option <?php if ($data['kategori_jemaat'] == "pam" ) echo 'selected' ; ?> value="pam">Persekutuan Anak Muda</option>
                        <option <?php if ($data['kategori_jemaat'] == "par" ) echo 'selected' ; ?> value="par">Persekutuan Anak & Remaja</option>
                    </select>
				</label>
				<button type="submit" name="submit">Submit</button>
			</form>
		</div>
	</body>
</html>
