<?php
	session_start();
	if ( !isset($_SESSION["login"]) ) {
        header("Location: index.php");
		exit;
    }

	require "func_data_jemaat.php";
    $raw_data = query("SELECT * FROM jemaat");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Data Jemaat</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/table/vendor/bootstrap/css/bootstrap.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/table/fonts/font-awesome-4.7.0/css/font-awesome.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/table/vendor/animate/animate.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/table/vendor/select2/select2.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/table/vendor/perfect-scrollbar/perfect-scrollbar.css"
		/>
		<link rel="stylesheet" type="text/css" href="assets/table/css/util.css" />
		<link rel="stylesheet" type="text/css" href="assets/table/css/style.css" />
		<style>
			.btn {
				width: 50%;
				margin-left: 20px;
			}
			.link-button {
				top: 1rem;
			}
		</style>
	</head>
	<body>
		<div class="limiter">
			<div class="back-button">
				<a href="index.php">
					&larr;
					<p>Back</p>
				</a>
			</div>
			<div class="container-table100">
				<div class="wrap-table100">
					<div class="table100">
						<div class="link-button-cetak btn-secondary">
							<a href="cetak.php" target="_blank">Cetak Data</a>
						</div>
						<div class="link-button">
							<a href="tambah_data_jemaat.php">Tambah Data</a>
						</div>
						<table>
							<thead>
								<tr class="table100-head">
									<th class="column1">ID Jemaat</th>
									<th class="column2">Nama Jemaat</th>
									<th class="column3">Jenis Kelamin</th>
									<th class="column4">Tanggal Lahir</th>
									<th class="column5">Foto</th>
									<th class="column6">Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($raw_data as $data) : ?>
								<tr>
									<td class="column1"><?= $data["id_jemaat"] ?></td>
									<td class="column2"><?= $data["nama_jemaat"] ?></td>
									<td class="column3"><?= $data["jenis_kelamin"] ?></td>
									<td class="column4"><?= $data["tanggal_lahir"] ?></td>
									<td class="column5"><img src="img/<?= $data["foto"]; ?>" width="50"></td>
									<td class="column6">
										<a class="btn btn-primary" href="edit_data_jemaat.php?id_jemaat=<?= $data["id_jemaat"]; ?>">edit</a>
										<a class="btn btn-danger" href="hapus_data_jemaat.php?id_jemaat=<?= $data["id_jemaat"]; ?>" onclick="return confirm('Data akan dihapus?');">hapus</a>
										<a class="btn btn-secondary" href="cetak.php?id_jemaat=<?= $data["id_jemaat"]; ?>" target="_blank">cetak</a>
									</td>
									</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script src="assets/table/vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="assets/table/vendor/bootstrap/js/popper.js"></script>
		<script src="assets/table/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/table/vendor/select2/select2.min.js"></script>
		<script src="assets/table/js/main.js"></script>
	</body>
</html>
