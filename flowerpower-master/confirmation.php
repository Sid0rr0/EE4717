<?php
include 'session.php';
include 'db_connection.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$data = "\"".$_POST["name"]."\",\"".$_POST["surname"]."\",\"".$_POST["address"]."\");";
$sql = 'INSERT INTO `customers` (`name`, `surname`, `address`) VALUES ('.$data;
mysqli_query($conn, $sql);

$sql = "SELECT COUNT(*) FROM customers;";
$result = $conn->query($sql);
$cnt = intval($result->fetch_assoc()["COUNT(*)"]);

$sql = "insert into sales (dt, customer_id) VALUES(NOW(), ".$cnt.")";
$conn->query($sql);

$sql = "SELECT COUNT(*) FROM sales;";
$result = $conn->query($sql);
$cnt = intval($result->fetch_assoc()["COUNT(*)"]);

$count_quantities = array_count_values($_SESSION['cart']);

foreach ($count_quantities as $id => $amt) {
    $sql = "insert into salesAmount (sale_id, flower_id, amount) VALUES($cnt, $id, $amt)";
    $conn->query($sql);
}

$to='f32ee@localhost';
$message= "Dear customer,\nwe confirm your order ID: ".$cnt."\nYour items:\n";
$totalPrice = 0;
foreach ($count_quantities as $id => $amt) {
    $sql = "SELECT name, price FROM `items` WHERE ID = $id;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $message = $message.$row["name"]." ".$amt." x $".$row["price"]."\n";
    $totalPrice += $row['price'] * intval($amt);
}
$message = $message . "\nTotal price: " . $totalPrice . "\n Thank your for the purchase and we hope that you'll shop with us again.";
echo $message;
wordwrap($message,70);
$subject='Flower Power';
$headers = 'From: f32ee@localhost' . "\r\n" .
  'Reply-To: f32ee@localhost' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();
/*
mail($to,$subject,$message,$headers,'-ff32ee@localhost');
*/
$conn->close();
/*
$_SESSION["cart"] = array();
$_SESSION["total-price"] = array();*/
//or destroy session
//session_destroy();

//todo decrease quantity of flower in the db?
//todo if quantity of flower was changed in cart it wont show in the email and in db
        //todo theoretically its fixed but for it to work when you change the qty in cart in would also need it in session
        //todo pass the qty through the form and not use session?

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
    <a href="contact.php">Contact us</a>
    </span>
        <span class="padding-span">
    <a href="cart.php"><?php echo array_sum($_SESSION['total-price'])?> $</a>
    </span>
    </nav>

    <div id="thanks"><h1>Thank you for the purchase!</h1>
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
