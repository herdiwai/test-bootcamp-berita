<?php

require 'function.php';
// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	

	//  cek apakah data berhasil ditambahkan atau tidak
	if ( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = '4.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = '4.php';
			</script>
		";
	}

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Tambah Beritat</title>
</head>
<body class="bg-dark">

<div class="container d-flex justify-content-center text-white">
	<div class="row">
		<form action="" method="POST" enctype="multipart/form-data">
		<h1 class="mt-4">Tambah Berita Baru</h1>
			<br>

            <div class="form-group">
				<label for="exampleInputEmail1">Title</label>
				<input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
			</div>

            
			<div class="form-group">
			    <label for="exampleFormControlFile1">Gambar</label>
			    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
			</div>

            <div class="form-group">
				<label for="description">Deskripsi</label>
				<textarea class="form-control" name="deskripsi" rows="3" placeholder="Enter Deskripsi"></textarea>
			</div>

            <div class="form-group">
			    <label for="exampleFormControlSelect1">User_Id</label>
			    <select class="form-control" name="user_id" id="exampleFormControlSelect1">
				    <option value="">Pilih</option>
				    <?php 
						$sql = mysqli_query($conn, "SELECT * FROM user ") or die (mysqli_error($conn));
						while ($data = mysqli_fetch_assoc($sql)) {
					?>
						<option value="<?=$data['id']?>"><?=$data['role']?></option>
					<?php
					    }
				    ?>
		    	</select>
			</div>

			<button type="submit" name="submit" class="btn btn-primary">Tambah</button>
			<br><br><br><br><br><br>
		</form>
	</div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

  <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="js/jquery-3.5.1.slim.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
