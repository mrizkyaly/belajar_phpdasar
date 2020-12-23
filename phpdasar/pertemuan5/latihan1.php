<?php 
	$hari = array("Senin", "Selasa", "Rabu");
	$bulan = ["Januari", "Februari", "Martet"];
	$arr1 = [123,"tulsian",false];

	var_dump($hari);
	echo "<br>";
	print_r($bulan);

	echo $arr1[0];
	echo "<br>";

	var_dump($hari);
	$hari[] = "kamis";
	echo "<br>";
	var_dump($hari);
?>