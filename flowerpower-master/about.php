<?php
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/about.css">
    <title>Flower Power</title>
</head>
<style>
    html{
        scroll-behavior:smooth
    }
</style>
<body>
<div class="allButFooter">
<nav id="top-nav">
    <span class="padding-span">
    <a href="shop.php">Shop</a>
    </span>
    <span class="padding-span">
    <a class="active-page" href="about.php">About us</a>
    </span>
    <span class="padding-span">
    <a href="index.php">Flower Power</a>
    </span>
    <span class="padding-span">
    <a href="contact.php">Contact us</a>
    </span>
    <span class="padding-span">
    <a href="cart.php"><?php echo array_sum($_SESSION['total-price'])?> $</a>
    </span>
</nav>
<div id="content-container" class="v-header">
    <div class="fullscreen-video-wrap">
        <video src="assets/flowers_15sec.mp4" autoplay loop muted></video>
    </div>
    <div class="header-overlay">

    </div>
    <div class="header-content">
        <h1>Handpicked just for you</h1> <!-- Flowers say it better -->
        <p>
            Our goal? To provide you with the best that the nature has to offer.
        </p>
    </div>
    <a href="#top-section">
        <img id="arrow-down" class="about-arrow" src="assets/arrowdown.svg" alt="arrow-down">
    </a>

</div>
<div class="containerAbout" id="top-section">
    <div class="sectionAbout section-a" >
        <h1>Our company</h1>
        <p>We pick our flowers hand-in-hand with you.</p>

    </div>
    <div class="sectionAbout section-b">
        <h1>Our producs</h1>
        <p>Where flowers bloom so does hope.</p>

    </div>
</div>
</div>

<footer>
    <div>
        Copyright © 2019 - 2019 Flower Power <br>
        <a href="mailto:info@flowerpower.com" id="mail">info@flowerpower.com</a>
    </div>
</footer>
</body>
</html>
