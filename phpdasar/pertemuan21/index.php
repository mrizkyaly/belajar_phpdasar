<?php
	session_start();
	if (!isset($_SESSION["login"])) {
		header("location: login.php");
		exit;
	}
	require 'function.php';
	$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");

	// Tombol cari ditekan
	if (isset($_POST["cari"])) {
		$mahasiswa = cari($_POST["keyword"]);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<style>
		.loader{
			width: 100px;
			position: absolute;
			top: 85px;
			left: 300px;
			z-index: -1;
			display: none;
		}

		@media print{
			.logout, .tambah, .form-cari, .aksi{
				display: none;
			}
		}
	</style>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>
	<a href="logout.php" class="logout">Logout</a> | <a href="cetak.php" target="_blank">Cetak</a>
	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php" class="tambah">Tambah Data Mahasiswa</a>
	<br></br>
	<form action="" method="post" class="form-cari">
		<input type="text" name="keyword" size="40" autofocus placeholder="input" autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">Cari lah</button>
		<img src="img/loader.gif" class="loader">
	</form>

	<br>
	<div id="container">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>No.</th>
				<th class="aksi">Aksi</th>
				<th>Gambar</th>
				<th>NRP</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Jurusan</th>
			</tr>
			<?php $i=1; ?>
			<?php foreach($mahasiswa as $row) : ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td class="aksi">
						<a href="ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a>
						<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Yakin ?'); ">Hapus</a>
					</td>
					<td><img src="img/<?php echo $row["gambar"]; ?>" alt="" width="50"></td>
					<td><?php echo $row["nrp"]; ?></td>
					<td><?php echo $row["nama"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["jurusan"]; ?></td>
				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>
		</table>
	</div>
</body>
</html>