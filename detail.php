<?php 

include "function.php";

$conn = mysqli_connect("127.0.0.1", "root", "", "berita");

$user_id= $_GET["user_id"];
$berita= query("SELECT * FROM user INNER JOIN news ON news.user_id = user.id WHERE user_id = $user_id")[0];

// $id = $_GET["id"];
// $berita =  query("SELECT * FROM news JOIN user ON news.user_id = user.id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Detail Produk</title>
</head>
<body class="bg-dark">
    <div class="container mt-4 text-white">
        <div class="row col-md-4">
            <img src="img/<?= $berita['image']; ?>" width="400" alt="Responsive image" class="img-fluid">
            <h3 class="text-warning"><?= $berita["title"]; ?></h3> 
            <p class="ml-2 font-italic font-weight-bold text-lowercase">Create By : <?= $berita['role']; ?></p>
            <p class="font-italic font-weight-bold text-lowercase">Email : <?= $berita['email']; ?></p>
            <p class="">Deskripsi : <?= $berita['deskripsi']; ?></p>
            <p class="font-italic text-lowercase">diupdate tanggal : <?= $berita['create_time']; ?></p>
            <h2 class="ml-4"></h2>
        </div>
    </div>


      <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="js/jquery-3.5.1.slim.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>  