<?php
include 'session.php';
include_once 'db_connection.php';
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
    <a href="index.php">Flower Power</a>
    </span>
    <span class="padding-span">
    <a href="contact.php">Contact us</a>
    </span>
    <span class="padding-span">
    <a href="cart.php"><?php echo array_sum($_SESSION['total-price']) ?> $</a>
    </span>
</nav>
<div class="shop-content">
    <div class="shop-header">
        <div class="shop-header-text">
            <h1>Our outdoor plants</h1>
            <p>Something for everyone</p>
        </div>
    </div>
    <div class="shop-banner">
        <h2>Our most popular products</h2>
    </div>
    <section class="shop-grid">
        <div class="plant-card">
            <div class="plant-image">
                <img src="assets/products/fredskalla.jpg">
            </div>
            <div class="plant-info">
                <h5>Fredskalla</h5>
                <h6>16$</h6>
            </div>
        </div>
        <div class="plant-card">
            <div class="plant-image">
                <img src="assets/products/pineapple.jpg">
            </div>
            <div class="plant-info">
                <h5>Fredskalla</h5>
                <h6>16$</h6>
            </div>
        </div>
        <div class="plant-card">
            <div class="plant-image">
                <img src="assets/products/paradise.jpg">
            </div>
            <div class="plant-info">
                <h5>Fredskalla</h5>
                <h6>16$</h6>
            </div>
        </div>
        <div class="plant-card">
            <div class="plant-image">
                <img src="assets/products/lemontree.jpg">
            </div>
            <div class="plant-info">
                <h5>Fredskalla</h5>
                <h6>16$</h6>
            </div>
        </div>
        <div class="plant-card">
            <div class="plant-image">
                <img src="assets/products/fredskalla.jpg">
            </div>
            <div class="plant-info">
                <h5>Fredskalla</h5>
                <h6>16$</h6>
            </div>
        </div>
    </section>


    <div class="shop-banner">
        <h2>All products</h2>
    </div>

    <section class="shop-grid">
      <?php

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT * FROM `items` WHERE `category` = 'outdoor' ";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <div id="<?php echo $row['ID'] ?>" class="plant-card">
                <div class="plant-image">
                    <img src=<?php echo "assets/products/" . strtolower(str_replace(' ', '', $row['name'])) . ".jpg" ?>>
                </div>
                <div class="plant-info">
                    <h5><?php echo $row['name']; ?></h5>
                    <h6><?php echo $row['price']; ?> $</h6>
                </div>
                <form method="GET" action="add-to-cart.php?category <?php echo $row['category'] ?>">
                    <button type='submit' id='<?php echo $row['ID'] ?>' value='<?php echo $row['ID'] ?>' name='submit'>
                        Add to cart
                    </button>
                </form>
            </div>
        <?php }
      } else {
        echo "0 results";
      }
      mysqli_close($conn);
      ?>
    </section>
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
