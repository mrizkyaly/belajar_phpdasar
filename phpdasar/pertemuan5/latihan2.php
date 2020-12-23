<?php  
	// Pengulangan pada array
	//for | foreach
$angka = [3,2,16,20,11,12,33];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Latihan 2</title>
	<style type="text/css" media="screen">
		.kotak{
			width: 50px;
			height: 50px;
			background-color: salmon;
			text-align: center;
			line-height: 50px;
			margin: 3px;
			float: left;
		}

		.clear{
			clear: both;
		}

		.header{
			
		}
	</style>
</head>
<body>
	<?php for ($i=0; $i < count($angka); $i++) { ?>
		<div class="kotak"><?php echo $angka[$i]; ?></div>
	<?php } ?>

	<div class="clear"></div>

	<?php foreach ($angka as $a) { ?>
		<div class="kotak"><?php echo  $a; ?></div>
	<?php } ?>

	<div class="clear"></div>

	<?php foreach ($angka as $a) : ?>
		<div class="kotak"><?= $a; ?></div>
	<?php endforeach; ?>

	<div class="header">
		<h1>asdasdasdasd</h1>
	</div>
	
</body>
</html>