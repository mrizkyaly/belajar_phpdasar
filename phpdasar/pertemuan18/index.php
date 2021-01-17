<?php
	session_start();
	if (!isset($_SESSION["login"])) {
		header("location: login.php");
		exit;
	}
	require 'function.php';
	// Pagination
	// Konfigurasi
	$jumlahDataPerHalaman = 2;
	$jumlahData = count(query("SELECT * FROM mahasiswa"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$awalData = ( $jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

	$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

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
		<input type="text" name="keyword" size="40" autofocus placeholder="input" autocomplete="off">
		<button type="submit" name="cari">Cari lah</button>
	</form>
	<br></br>

	<!-- Navigasi -->
	<?php if($halamanAktif >1) :?>
		<a href="?halaman<?= $halamanAktif - 1;?>">&laquo;</a>
	<?php endif; ?>

	<?php for($i = 1; $i <= $jumlahHalaman; $i++) :?>
		<?php if( $i == $halamanAktif) :?>
			<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:red;"><?= $i; ?></a>
		<?php else : ?>
			<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
		<?php endif;?>
	<?php endfor;?>

	<?php if($halamanAktif < $jumlahHalaman) :?>
		<a href="?halaman<?= $halamanAktif + 1;?>">&raquo;</a>
	<?php endif; ?>

	<br>
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
</body>
</html>