<?php
	session_start();
	if ( !isset($_SESSION["login"]) ) {
        header("Location: index.php");
		exit;
	}

	require "func_data_admin.php";
    $raw_data = query("SELECT * FROM administrator");
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
						<div class="link-button">
							<a href="tambah_data_admin.php">Tambah Data</a>
						</div>
						<table>
							<thead>
								<tr class="table100-head">
									<th class="column1">ID Admin</th>
									<th class="column2">Username</th>
                                    <th class="column3">Password</th>
                                    <th class="column6"> Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($raw_data as $data) : ?>
								<tr>
									<td class="column1"><?php echo $data["id_admin"] ?></td>
									<td class="column2"><?php echo $data["username"] ?></td>
									<td class="column3"><?php echo $data["password"] ?></td>
									<td class="column6">
										<a class="btn btn-danger" href="hapus_data_admin.php?id_admin=<?= $data["id_admin"]; ?>" onclick="return confirm('Data akan dihapus?');">hapus</a>
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
