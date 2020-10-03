<?php 

$conn = mysqli_connect("127.0.0.1", "root", "", "berita");


$result = mysqli_query($conn, "SELECT * FROM news INNER JOIN user ON news.user_id = user.id");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Berita Terbaru</title>
</head>
<body class= "bg-dark">

<div class="container mt-4">
    <div class="row col-md">
        <a class="btn btn-success btn-sm mr-4" href="tambah_user.php" role="button">Tambah User</a>
        <a class="btn btn-success btn-sm" href="tambah_berita.php" role="button">Tambah Berita</a>
    </div>
</div>
    
<div class="container">
    <div class="row">
        <div class="col-md d-flex justify-content-start text-white mt-4">
            <h2>Berita Terbaru</h2>
        </div>
    </div>
</div>

<?php while ($row = mysqli_fetch_assoc($result)) : ?>

<div class="container mt-4">
    <div class="col-md row">
        <img src="img/<?= $row["image"]; ?>" width ="200px" alt="" class="img-thumbnail">
        <div class="col-md text-white">
            <h3 class="text-warning"><?= $row["title"]; ?></h3>
            <p class= "font-italic font-weight-bold text-lowercase">Create By : <?= $row["role"]; ?></p>
            <p class="pt-2"><?= $row["deskripsi"]; ?></p>
            <a class="btn btn-primary btn-sm" href="detail.php?user_id=<?= $row["user_id"]; ?>" role="button">Baca Berita</a>
        </div>
    </div>
</div>

<?php endwhile; ?>


    <script src="js/jquery-3.5.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
