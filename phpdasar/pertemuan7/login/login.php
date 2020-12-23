<?php  
	// Cek apakah tombol submit sudah tekan atau belum
if (isset($_POST["submit"])) {
		// Cek username & password
	if ($_POST["username"] == "admin" && $_POST["password"] == "123") {
			// Jika benar ridirect ke halaman admin
		header("Location: admin.php");
		exit;
	}else{
			// Jika salah message kesalahan
		$error = true;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<h1>login admin</h1>
	<?php if (isset($error)) :?>
		<p style="color: red;">Usernmae/Password salah</p>
	<?php endif; ?>
	<ul>
		<form action="" method="post">
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<button type="submit" name="submit">Login</button>
			</li>
		</form>
	</ul>
	
</body>
</html>