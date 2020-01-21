<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Flower Power</title>
</head>
<style>
    html{
        scroll-behavior:smooth
    }
</style>
<body>
<div class="allButFooter">
<div class="allButFooter">
<nav id="top-nav">
    <span class="padding-span">
    <a href="shop.php">Shop</a>
    </span>
    <span class="padding-span">
    <a href="about.php">About us</a>
    </span>
    <span class="padding-span">
    <a class="active-page" href="index.php">Flower Power</a>
    </span>
    <span class="padding-span">
    <a href="contact.php">Contact us</a>
    </span>
    <span class="padding-span">
    <a href="cart.php"> <?php echo array_sum($_SESSION['total-price'])?> $</a>
    </span>
</nav>
<div id="content-container">
    <div id="logo">
        <img src="assets/Flower_power.png">
    </div>
    <div id="bg">
        <img src="assets/background.png">
    </div>

    <a href="#main-content">
        <img id="arrow-down" src="assets/arrowdown.svg" alt="arrow-down">
    </a>
</div>
<div id="main-content">
    <div class="section">Happy Customers</div>

    <div class="content-grid">
        <img class="grid-item1" src="assets/shelby-miller-Y9ehdvCmI-c-unsplash.jpg">
        <p class="grid-item2">Shelby was one of the first customers who tired flower power, with her growing interest
            for flowers,
            Flowerpower was the perfect site for her.
            Her garden and plats indoors are mainly purchased from Flowerpower and she couldn't be happier.
        </p>
        <img class="grid-item3" src="assets/priscilla-du-preez-EpfyudUQB30-unsplash.jpg">
        <p class="grid-item4">Shelby was one of the first customers who tired flower power, with her growing interest
            for flowers,
            Flowerpower was the perfect site for her.
            Her garden and plats indoors are mainly purchased from Flowerpower and she couldn't be happier.
        </p>
    </div>
    <div class="section">Inspiration</div>
    <div class="row">
        <div class="column">
            <img src="assets/Grid-images/joe-green-9yoPzIns9G4-unsplash.jpg">
            <img src="assets/Grid-images/lita-ruza-xZjJUVXDals-unsplash.jpg">
            <img src="assets/Grid-images/annie-spratt-7qotv-1XF2A-unsplash.jpg">
        </div>
        <div class="column">
            <img src="assets/Grid-images/ivan-jevtic-p7mo8-CG5Gs-unsplash.jpg">
            <img src="assets/Grid-images/bence-balla-schottner-K2DEP6VRB4Q-unsplash.jpg">
            <img src="assets/Grid-images/cherry-laithang-DEAIMSWjxxI-unsplash.jpg">
        </div>
        <div class="column">
            <img src="assets/Grid-images/fiona-smallwood-rA2t29hZj1s-unsplash.jpg">
            <img src="assets/Grid-images/biel-morro-kcKiBcDTJt4-unsplash%20(1).jpg">
        </div>
        <div class="column">
            <img src="assets/Grid-images/irina-iriser-mNz9Pa3tz34-unsplash.jpg">
            <img src="assets/Grid-images/thomas-smith-2cFxxNtgrb8-unsplash.jpg">
            <img src="assets/Grid-images/annie-spratt-01Wa3tPoQQ8-unsplash.jpg">
        </div>
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
