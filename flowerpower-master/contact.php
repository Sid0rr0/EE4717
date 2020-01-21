<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Flower Power</title>
    <script src="js/script.js" defer></script>

</head>
<body>
<div class="allButFooter">
<nav id="top-nav">
    <span class="padding-span">
    <a href="shop.php">Shop</a>
    </span>
    <span class="padding-span">
    <a href="about.php">About us</a>
    </span>
    <span class="padding-span">
    <a href="index.php">Flower Power</a>
    </span>
    <span class="padding-span">
    <a class="active-page" href="contact.php">Contact us</a>
    </span>
    <span class="padding-span">
    <a href="cart.php"><?php echo array_sum($_SESSION['total-price'])?> $</a>
    </span>
</nav>
<div id="content-container">
    <div id="contact">
        <div id="box">
        <div id="contact-left" class="contact-box">

            <h2>Contact us</h2>
            <p>
                Want to tell us something?
            </p>
            <p>
                Don't hesitate and send us a message!
            </p>

        </div>
        <div id="contact-right" class="contact-box">
            <h2>Say Hello!</h2>
            <fieldset>
                <!--action="show_post.php" -->
                <form name="contactForm" id="contactForm" method="post"
                onsubmit="return validateForm()" novalidate>
                    <label for="name"></label>
                    <input
                        placeholder="Full name"
                        onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Full name'"
                        name="name"
                        id="name"
                        onchange="validateName()"
                    /><br>
                    <label for="email"></label>
                    <input
                        placeholder="Email"
                        name="email"
                        id="email"
                        onchange="validateEmail()"
                        onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Email'"/><br>
                    <label for="message"></label>
                    <textarea rows="4" cols="30" id="message" placeholder="Message"></textarea><br>
                    <button type='reset'>Clear</button>
                    <button type="submit">Send</button>
                </form>
            </fieldset>
        </div>
        </div>
    </div>
    <div id="bg">
        <img src="assets/background.png">
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
