<?php  
	$mahasiswa = [
		["Rizy Aly", "08983539989", "Teknik Informatika", "mrizkyaly@gmail.com"],
		["hafidz", "08983531219", "Teknik Informatika", "hafidz@gmail.com"]
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
		<li>Nama 	: <?php echo $mhs[0]; ?></li>
		<li>Nomor 	: <?php echo $mhs[1]; ?></li>
		<li>Jurusan : <?php echo $mhs[2]; ?></li>
		<li>Email	: <?php echo $mhs[3]; ?></li>
	</ul>
	<?php endforeach; ?>
</body>
</html>