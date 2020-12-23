<?php  
	// Koneksi ke database
$conn = mysqli_connect("localhost","root","","phpdasar");
	// Ambil data dari table mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
	// Ambil data (fetch mahasiswa dari object result)
	// mysqli_fetch_row / mengambil array numerik
	// mysqli_fetch_assoc / mnegambil array asosiatif
	// mysqli_fetch_array /megambil array numerik dan asosiatif
	// mysqli_fetch_object / mengambil dengan panah
	// $mhs = mysqli_fetch_assoc($result);
	// var_dump($mhs);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
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
		<?php while ($row = mysqli_fetch_assoc($result)) : ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td>
					<a href="">Ubah</a>
					<a href="">Hapus</a>
				</td>
				<td><img src="img/<?php echo $row["gambar"]; ?>" alt="" width="50"></td>
				<td><?php echo $row["nrp"]; ?></td>
				<td><?php echo $row["nama"]; ?></td>
				<td><?php echo $row["email"]; ?></td>
				<td><?php echo $row["jurusan"]; ?></td>
			</tr>
			<?php $i++; ?>
		<?php endwhile; ?>
	</table>
</body>
</html>