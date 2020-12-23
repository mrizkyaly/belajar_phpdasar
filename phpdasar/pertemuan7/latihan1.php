<?php  
$mahasiswa = [
	[
		"nama" => "Rizky Aly",
		"npm" => "123123123123",
		"jurusan" => "Teknik Informatika",
		"email" => "RizkyAly@gmail.com",
		"gambar" => "rick.jpg"
	],
	[
		"nama" => "Hafidz",
		"npm" => "123123121444",
		"jurusan" => "Teknik Informatika",
		"email" => "hafidz@gmail.com",
		"gambar" => "morty.jpeg"
	]
];
?>

<!DOCTYPE html>
<html>
<head>
	<title>GET</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<ul>
		<?php foreach($mahasiswa as $mhs) : ?>
			<li>
				<a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&npm=<?= $mhs["npm"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&email=<?= $mhs["email"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"]; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>	
</body>
</html>