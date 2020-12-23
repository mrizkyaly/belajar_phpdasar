<?php  
	// $mahasiswa = [
	// 	["Rizy Aly", "08983539989", "Teknik Informatika", "mrizkyaly@gmail.com"],
	// 	["hafidz", "08983531219", "Teknik Informatika", "hafidz@gmail.com"]
	// ];

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
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<?php foreach($mahasiswa as $mhs) :?>
	<ul>
		<li>
			<img src="img/<?php echo $mhs["gambar"]; ?>">
		</li>
		<li>Nama 	: <?php echo $mhs["nama"]; ?></li>
		<li>Nomor 	: <?php echo $mhs["npm"]; ?></li>
		<li>Jurusan : <?php echo $mhs["jurusan"]; ?></li>
		<li>Email	: <?php echo $mhs["email"]; ?></li>
	</ul>
	<?php endforeach; ?>
</body>
</html>