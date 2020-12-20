<?php
	session_start();
	if ( !isset($_SESSION["login"]) ) {
		header("Location: login.php");
		exit;
	}

	include_once("assets/chartphp/config.php");
	include_once(CHARTPHP_LIB_PATH . "/inc/chartphp_dist.php");

	$p = new chartphp();

	$p->data_sql = "SELECT kategori_jemaat.kategori_jemaat, COUNT(jemaat.nama_jemaat)
	FROM jemaat, kategori_jemaat
	WHERE jemaat.id_jemaat = kategori_jemaat.id_jemaat
	GROUP BY kategori_jemaat.id_kategori_jemaat
	ORDER BY kategori_jemaat.id_kategori_jemaat";

	$p->chart_type ="bar";

	$p->title = "Data Jumlah Perkategori Jemaat";
	$p->xlabel = "Kategori Jemaat";
	$p->ylabel = "Jumlah jemaat";

	$out = $p->render('c1');

	require 'func_data_jemaat.php';
	$raw_data = query("SELECT COUNT(jemaat.nama_jemaat) AS jumlah FROM jemaat")
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Halaman Utama</title>
		<script src="assets/chartphp/lib/js/jquery.min.js"></script>
        <script src="assets/chartphp/lib/js/chartphp.js"></script>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<div id="container">
			<header>
				<h1>Pendataan Jemaat Gereja</h1>
				<div><a href="logout.php">Logout</a></div>
			</header>
			<div class="flex-container">
				<aside>
					<h2>Dashboard</h2>
					<nav>
						<ul>
							<li><a href="data_jemaat.php">Data Jemaat</a></li>
							<li>
								<a href="data_kategori_jemaat.php">Data Kategori Jemaat</a>
							</li>
							<li><a href="data_administrator.php">Data Administrator</a></li>
						</ul>
					</nav>
				</aside>
				<main>
					<div class="card">
						<div>
							<?php foreach($raw_data as $jumlah_jemaat) : ?>
								<p> Jumlah Jemaat : <?php echo $jumlah_jemaat['jumlah'] ?></p>
							<?php endforeach; ?>
						</div>
						<?php echo $out; ?>
						</div>
				</main>
			</div>
			<footer>
				<p>&copy;2020 2EZ4ME</p>
			</footer>
		</div>
	</body>
</html>
