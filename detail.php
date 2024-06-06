<?php 
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mvi = query("SELECT * FROM movie WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uji coba</title>

    <link
  rel="stylesheet"
  href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="detail.css">

</head>

<body>


    <header>
        <a href="#" class="logo"><i class="fas fa-infinity"></i>Movie.</a>
        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="index.php#anime">anime</a>
            <a href="index.php#action">action</a>
            <a href="index.php#child">child</a>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <i class="fas fa-search" id="search-icon"></i>
            <a href="logout.php" class="fas solid fa-user"></a>
        </div>
    </header>

    <div class="poster">
        <img src="gambar/<?= $mvi["gambar"]; ?>">
        <h1><?= $mvi["judul"]; ?></h1>
        <p><?= $mvi["sinopsis"]; ?></p>
        <p class="rating"> <?= $mvi["rating"]; ?></p>
        <p class="year"> <?= $mvi["tahun_rilis"]; ?> </p>
    </div>

    <div class="copyright container">
    <a href="#" class="logo"><i class="fas fa-infinity"></i>Movie.</a>
    <p>&#169;All rights reserved.</p>
    </div>


 <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js" defer data-deferred="1"></script>  <script src="main.js" defer data-deferred="1"></script>
  </body>
</html>
 
  