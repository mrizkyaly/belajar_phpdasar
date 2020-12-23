<?php  
	require 'function.php';
	$mahasiswa = query("SELECT * FROM mahasiswa")
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php">Tambah Data Mahasiswa</a>
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
					<a href="">Ubah</a>
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