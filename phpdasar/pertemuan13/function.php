<?php  
	// Koneksi ke database
	$conn = mysqli_connect("localhost","root","","phpdasar");

	function query($query){
		global $conn;

		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row =  mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambah($data){
		global $conn;

		// Ambil data dari tiap elemen dalam form
		$nrp = htmlspecialchars($_POST["nrp"]);
		$nama = htmlspecialchars($_POST["nama"]);
		$email = htmlspecialchars($_POST["email"]);
		$jurusan = htmlspecialchars($_POST["jurusan"]);

		// $gambar = htmlspecialchars($_POST["gambar"]);

		// Upload Gambar
		$gambar = upload();
		if (!$gambar) {
			return false;
		}

		// query insert data
		$query = "INSERT INTO mahasiswa VALUES ('','$nrp','$nama','$email', '$jurusan','$gambar')";

		mysqli_query($conn,$query);

		return mysqli_affected_rows($conn);
	}

	function upload(){
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		// cek apakah tidak ada gambar yang diupload
		if ($error === 4) {
			echo "</script> 
						alert('pilih gambar terlebih dahulu'); 
					</script>";
			return false;
		}

		// cek apakah yang di upload gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
			echo "</script> 
						alert('yang anda upload bukan gambar'); 
					</script>";
			return false;
		}

		// Cek jika ukurannya terlalu besar
		if ( $ukuranFile > 1000000) {
			echo "</script> 
						alert('ukuran gambar terlalu besar'); 
					</script>";
			return false;
		}

		// Genereate nama baru
		$namaFIleBaru = uniqid();
		$namaFIleBaru .= '.';
		$namaFIleBaru .= $ekstensiGambar;

		// Lolos pengecekan,gambar siap diupload
		move_uploaded_file($tmpName, 'img/'.$namaFIleBaru);
		return $namaFIleBaru;
	}

	function ubah($data){
		global $conn;

		// Ambil data dari tiap elemen dalam form
		$id = $data["id"];
		$nrp = htmlspecialchars($_POST["nrp"]);
		$nama = htmlspecialchars($_POST["nama"]);
		$email = htmlspecialchars($_POST["email"]);
		$jurusan = htmlspecialchars($_POST["jurusan"]);
		$gambarLama = htmlspecialchars($data['gambarLama']);

		// Cek apakah user pilih gambar baru atau tidak
		if ($_FILES['gambar']['error'] === 4) {
			$gambar = $gambarLama;
		}else {
			$gambar = upload();
		}

		// query updaet data
		$query = "UPDATE mahasiswa SET 
					nrp = '$nrp', 
					nama = '$nama', 
					email = '$email', 
					jurusan = '$jurusan', 
					gambar = '$gambar' 
					WHERE id = $id
				";

		mysqli_query($conn,$query);

		return mysqli_affected_rows($conn);
	}

	function hapus($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
		return mysqli_affected_rows($conn);
	}

	function cari($keyword){
		$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";
		return query($query);
	}
?>