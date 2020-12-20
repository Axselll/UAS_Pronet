<?php
	require "func_data_jemaat.php";
	$id = $_GET['id_jemaat'];
    $raw_data = query("SELECT nama_jemaat, jenis_kelamin, tanggal_lahir, kategori_jemaat
	FROM jemaat, kategori_jemaat
	WHERE jemaat.id_jemaat = kategori_jemaat.id_jemaat
	AND jemaat.id_jemaat LIKE '%$id%'");
	$content = '
	<html> 
	<body>
		<h1>DAFTAR JEMAAT</h1> 
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>Nama Jemaat</th>
				<th>Jenis Kelamin</th>
				<th>Tanggal Lahir</th>
				<th>Kategori Jemaat</th>
			</tr>';
		foreach($raw_data as $data) {
		$content.='
		<tr>
			<td>'. $data["nama_jemaat"] .'</td>
			<td>'. $data["jenis_kelamin"] .'</td>
			<td>'. $data["tanggal_lahir"] .'</td>
			<td>'. $data["kategori_jemaat"] .'</td>
		</tr>';
	}
	$content.='
	</table>
	</body>
	</html>
	';

	require_once "./assets/mpdf/vendor/autoload.php";
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
	$mpdf->WriteHTML($content);
	$mpdf->Output();
?>