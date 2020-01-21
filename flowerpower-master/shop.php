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
<body>
<div class="allButFooter">
<nav id="top-nav">
    <span class="padding-span">
    <a class="active-page" href="shop.php">Shop</a>
    </span>
    <span class="padding-span">
    <a href="about.php">About us</a>
    </span>
    <span class="padding-span">
    <a  href="index.php">Flower Power</a>
    </span>
    <span class="padding-span">
    <a href="contact.php">Contact us</a>
    </span>
    <span class="padding-span">
    <a href="cart.php"><?php echo array_sum($_SESSION['total-price'])?> $</a>
    </span>
</nav>
<div class="category-content">
    <a href="outdoor_shop.php">
        <div class="category">
        Outdoor Flowers
    </div>
    </a>
    <a href="indoor_shop.php">
    <div id="indoor"  class="category">
        Indoor Flowers
    </div>
    </a>

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
