<?php
require 'functions.php';


$anime = query(" SELECT * FROM movie WHERE jenis_film='anime' ");
$action = query(" SELECT * FROM movie WHERE jenis_film='action' ");
$child = query(" SELECT * FROM movie WHERE jenis_film='family' ");
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


    <link rel="stylesheet" href="style.css">

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
            <a href="login.php" class="fas solid fa-user"></a>
        </div>
    </header>
    
<section class="home" id="home">

    <div class="swiper home-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="box " style="background: url(gambar/avatar-the-way-of-water-avatar-2-2022-movies-sam-8000x5000-8963.jpg) no-repeat;">
                    <div class="content">
                        <h3>Avatar The Way of Water</h3>
                        <p>Jake Suly menjalani kehidupan bahagia di Pandora bersama Neytiri dan dua anak mereka. Sebagai pemimpin suku Na'vi, Jake menghadapi berbagai ancaman, sambil mengajarkan teknik berperang kepada anak-anaknya</p>
                        <a href="detail.php?id=17" class="btn">See More</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box second" style="background: url(gambar/doraemon-4k.jpg) no-repeat;">
                    <div class="content">
                        <h3>Stand By Me Doraemon 2</h3>
                         <p>Suatu hari Nobita menemukan boneka beruang yang ditambal jahit tangan oleh nenek tercinta. Hal tersebut memicu kenangan mengharukan untuknya dan menanyakan kepada Doraemon apakah mereka dapat menggunakan mesin waktu untuk mengunjungi Nenek di masa lampau</p>
                        <a href="detail.php?id=18" class="btn">See More</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box second" style="background: url(gambar/kimi-no-nawa-4k.jpg) no-repeat;">
                    <div class="content">
                        <h3>Kimi no nawa</h3>
                         <p>	Dua remaja terhubung melalui mimpi, berusaha bertukar tempat untuk mengubah takdir mereka.</p>
                        <a href="detail.php?id=25" class="btn">See More</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box " style="background: url(gambar/kungfu-panda-4.jpeg) no-repeat;">
                    <div class="content">
                        <h3>Kungfu Panda 4</h3>
                        <p>Po, sang Pendekar Naga telah melalui tiga petualangan menantang maut. Dia mampu mengalahkan penjahat kelas dunia dengan keberaniannya dan juga kemampuan bela diri yang luar biasa.</p>
                        <a href="detail.php?id=20" class="btn">See More</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>



<section class="anime" id="anime">
    <h1 class="heading">Popular on Anime</h1>
    <div class="swiper anime-slider">
        <div class="swiper-wrapper">
            <?php $i = 1; ?>
            <?php foreach( $anime as $row ) : ?>
                <div class="swiper-slide">
                    <div class="box" style="background: url(gambar/<?= $row["gambar"]; ?>) no-repeat;" ></div>
                    <div class="content">
                        <h3><?= $row["judul"]; ?></h3>
                        <p><?= $row["sinopsis_singkat"]; ?></p>
                        <a href="detail.php?id=<?= $row["id"]; ?>" class="btn">See More</a>
                    </div>
                </div>
            <?php $i++; ?>
            <?php endforeach; ?>



        </div>
    </div>
</section>



<section class="action" id="action">
    <h1 class="heading">Action Movies</h1>
    <div class="swiper action-slider">
        <div class="swiper-wrapper">

            <?php $i = 1; ?>
            <?php foreach( $action as $row ) : ?>
                <div class="swiper-slide">
                    <div class="box" style="background: url(gambar/<?= $row["gambar"]; ?>) no-repeat"
                    style="background-size: 50% 50%"></div>
                    <div class="content">
                        <h3><?= $row["judul"]; ?></h3>
                        <p><?= $row["sinopsis_singkat"]; ?></p>
                        <a href="detail.php?id=<?= $row["id"]; ?>" class="btn">See More</a>
                    </div>
                </div>
            <?php $i++; ?>
            <?php endforeach; ?>



        </div>
    </div>
</section>



<section class="child" id="child">
    <h1 class="heading">Child Movies</h1>
    <div class="swiper child-slider">
        <div class="swiper-wrapper">
            <?php $i = 1; ?>
            <?php foreach( $child as $row ) : ?>
                <div class="swiper-slide">
                    <div class="box" style="background: url(gambar/<?= $row["gambar"]; ?>) no-repeat"
                    style="background-size: 50% 50%"></div>
                    <div class="content">
                        <h3><?= $row["judul"]; ?></h3>
                        <p><?= $row["sinopsis_singkat"]; ?></p>
                        <a href="detail.php?id=<?= $row["id"]; ?>" class="btn">See More</a>
                    </div>
                </div>
            <?php $i++; ?>
            <?php endforeach; ?>
            

        </div>
    </div>
</section>

<section class="about">
    <h2>Anggota Kelompok</h2>
    <ul>
        <p>Jacob Rahayaan (230211060066)</p> <br>
        <p>Misael Mokansi (230211060049)</p> <br>
        <p>Lourdes Batjo (230211060070)</p> <br>
    </ul>
</section>




<div class="copyright container">
    <a href="#" class="logo"><i class="fas fa-infinity"></i>Movie.</a>
    <p>&#169;All rights reserved.</p>
</div>


 <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js" defer data-deferred="1"></script>  <script src="main.js" defer data-deferred="1"></script> </body>
</html>