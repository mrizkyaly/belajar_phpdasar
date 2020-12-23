<?php 
	// Cek apakah tidak ada data get
	if ( !isset($_GET["nama"]) || !isset($_GET["npm"]) || !isset($_GET["jurusan"]) || !isset($_GET["email"]) || !isset($_GET["gambar"])) {
		// memindahkan halaman
		header("Location: latihan1.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Mahasiswa</title>
</head>
<body>
	<ul>
		<li><img src="img/<?= $_GET["gambar"]; ?>"></li>
		<li><?= $_GET["nama"]; ?></li>
		<li><?= $_GET["npm"]; ?></li>
		<li><?= $_GET["email"]; ?></li>
		<li><?= $_GET["jurusan"]; ?></li>
	</ul>

	<a href="latihan1.php" title="">Kembali ke daftar mahasiswa</a>
</body>
</html>