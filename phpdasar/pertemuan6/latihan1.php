<!DOCTYPE html>
<html>
<head>
	<title>Latihan 1 - P6</title>
	<style type="text/css" media="screen">
		.kotak{
			width: 50px;
			height: 50px;
			background-color: salmon;
			text-align: center;
			line-height: 50px;
			margin: 3px;
			float: left;
			transition: 1.5s;
		}

		.kotak:hover{
			transform: rotate(360deg);
			border-radius: 50%;
		}

		.clear{
			clear: both;
		}
	</style>
</head>
<body>
	<?php  
		$angka = [
			[1,2,3],
			[3,5,6],
			[7,8,9]
		];
	?>

	<?php foreach($angka as $a) : ?>
		<?php foreach($a as $b) : ?>
			<div class="kotak"><?php echo $b; ?></div>
		<?php endforeach; ?>
		<div class="clear"></div>
	<?php endforeach; ?>

</body>
</html>