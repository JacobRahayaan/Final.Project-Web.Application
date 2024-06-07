<?php
require 'functions.php';


$anime = query(" SELECT * FROM movie WHERE jenis_film='anime' ");
$action = query(" SELECT * FROM movie WHERE jenis_film='action' ");
$chil = query(" SELECT * FROM movie WHERE jenis_film='family' ");
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
                        <p>High roller Yumeko Jabami plans to clean house at Hyakkaou Private<br>
                        Academy, a school where students are evaluated solely on their<br>
                        gambling skills.</p>
                        <a href="#" class="btn">See More</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box second" style="background: url(gambar/doraemon-4k.jpg) no-repeat;">
                    <div class="content">
                        <h3>Doraemon</h3>
                         <p>When a Japanese high schooler comes into possession of a mystical<br>
                        notebook, he finds he has the power to kill anybody whose name he<br>
                        enters in it.</p>
                        <a href="#" class="btn">See More</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box second" style="background: url(gambar/kimi-no-nawa-4k.jpg) no-repeat;">
                    <div class="content">
                        <h3>Kimi no nawa</h3>
                         <p>The most powerful superhero in the world can kill anyone with one<br>
                        blow. But nothing can challenge him, so he struggles with ennui and<br>
                        depression</p>
                        <a href="#" class="btn">See More</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box " style="background: url(gambar/mission-impossible.jpg) no-repeat;">
                    <div class="content">
                        <h3>Kungfu Panda 4</h3>
                        <p>Guided by the spirit demon within him, orphaned Naruto learns<br>
                        to harness his powers as a ninja in this anime adventure series.</p>
                        <a href="#" class="btn">See More</a>
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
                    <div class="box" style="background: url(gambar/<?= $row["gambar"]; ?>)"
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
            <?php foreach( $action as $row ) : ?>
                <div class="swiper-slide">
                    <div class="box" style="background: url(gambar/<?= $row["gambar"]; ?>)"
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




<div class="copyright container">
    <a href="#" class="logo"><i class="fas fa-infinity"></i>Movie.</a>
    <p>&#169;All rights reserved.</p>
</div>


 <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js" defer data-deferred="1"></script>  <script src="main.js" defer data-deferred="1"></script> </body>
</html>