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
</head>
<body>
	<a href="logout.php">Logout</a>
	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php">Tambah Data Mahasiswa</a>
	<br>
	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="input" autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">Cari lah</button>
	</form>

	<br>
	<div id="container">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>No.</th>
				<th>Aksi</th>
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
					<td>
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
	
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>