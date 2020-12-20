<?php
	session_start();
	if ( !isset($_SESSION["login"]) ) {
        header("Location: index.php");
		exit;
	}

	require "func_data_jemaat.php";
    $id = $_GET['id_jemaat'];
    $data = query("SELECT * FROM jemaat WHERE id_jemaat = $id")[0];

    if( isset($_POST["submit"]) ) {
        if (ubah($_POST) > 0 ) {
            echo "<script>
                alert('Berhasil')
                document.location.href = 'data_jemaat.php'
            </script>";
        } else {
            echo "<script>
                alert('Gagal')
                document.location.href = 'data_jemaat.php'
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Edit Data Jemaat</title>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<div class="container">
			<header class="head">
				<h1>Input Data Jemaat Gereja</h1>
			</header>
			<div class="back-button">
				<a href="data_jemaat.php">
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
                <input type="hidden" name="id_jemaat" value="<?php echo $data['id_jemaat'] ?>">
                <input type="hidden" name="foto_lama" value="<?php echo $data['foto'] ?>">
				<label>
					<span>Nama Jemaat :</span>
					<input type="text" name="nama_jemaat" value="<?php echo $data['nama_jemaat'] ?>" />
				</label>
				<label>
					<span>Jenis Kelamin :</span>
					<input type="radio" name="jenis_kelamin" value="laki-laki"<?php echo ($data['jenis_kelamin']=="laki-laki")?'checked':''; ?> />
					<label>Laki-laki</label>
					<input type="radio" name="jenis_kelamin" value="perempuan"<?php echo ($data['jenis_kelamin']=="perempuan")?'checked':''; ?>  />
					<label>Perempuan</label>
				</label>
				<label>
					<span>Tanggal Lahir :</span>
					<input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir'] ?>" />
				</label>
				<label>
					<span>Foto :</span>
                    <input type="file" name="foto" />
                    <img src="img/<?php echo $data['foto']; ?>" style="width: 50px;">
                </label>
				<button type="submit" name="submit">Submit</button>
			</form>
		</div>
	</body>
</html>
