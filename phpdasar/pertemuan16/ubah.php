<?php
	session_start();
	if (!isset($_SESSION["login"])) {
		header("location: login.php");
		exit;
	}
	require 'function.php';
	// Ambil data di url
	$id = $_GET["id"];
	// query data mahasiswa berdasarkan id
	$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
	// Cek apakah tombol submit sudah ditekan atau belum
	if (isset($_POST["submit"])) {
		// Cek apakah data berhasil atau tidak saat ditambahkn
		if ( ubah($_POST) > 0) {
			echo "<script>
				  	alert('data berhasil diubah!');
				  	document.location.href = 'index.php';
				  </script>
			";
		}else{
			// echo("Error description: " . $conn -> error);
			echo "<script>
				  	alert('data Tidak berhasil diubah!');
				  	document.location.href = 'index.php';
				  </script>
			";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Mahasiswa</title>
</head>
<body>
	<h1>Ubah Data Mahasiswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?php echo $mhs["gambar"]; ?>">
		<ul>
			<li>
				<label for="nrp">NRP</label>
				<input type="text" name="nrp" id="nrp" required value="<?php echo $mhs["nrp"]; ?>">
			</li>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" value="<?php echo $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?php echo $mhs["email"]; ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan</label>
				<input type="text" name="jurusan" id="jurusan" value="<?php echo $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar</label><br>
				<img src="img/<?php echo $mhs['gambar']; ?>" width="40"><br>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data</button>
			</li>
		</ul>
	</form>
</body>
</html>