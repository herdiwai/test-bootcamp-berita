<?php 
$conn = mysqli_connect("127.0.0.1", "root", "", "berita");

function query($query) {
    global $conn;
    
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function user($data) {
	global $conn;

    $name = strtolower(stripslashes($data["name"]));
    $email = strtolower($data["email"]);
    $role = strtolower($data["role"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT name FROM user WHERE name = '$name'");
	if( mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah terdaftar');
			  </script>";
		return false;
	}

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$name', '$email', '$role')");

	return mysqli_affected_rows($conn);
}

function tambah($data) {
    global $conn;
    
    $title = htmlspecialchars($data["title"]);
    
	// upload gambar
	$image = upload();
	if( !$image) {
		return false;
    }
    
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $create_time = date("Y-m-d H:i:s");
	$user_id = htmlspecialchars($data["user_id"]);

	


	$query = "INSERT INTO news
				VALUES
				('', '$title', '$image', '$deskripsi','$create_time','$user_id')
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


function upload() {
	
	$namaFile = $_FILES['image']['name'];
	$ukuranFile = $_FILES['image']['size'];
	$error = $_FILES['image']['error'];
	$tmpName = $_FILES['image']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu !');
			</script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile); 
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('yang diupload bukan gambar !');
			</script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000) {
		echo "<script>
				alert('ukuran gambar terlalu besar !');
			</script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
	return  $namaFileBaru;
}













?>