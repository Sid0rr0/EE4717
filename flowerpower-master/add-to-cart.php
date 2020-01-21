<?php
include 'session.php';
include 'db_connection.php';

$id = $_GET['submit'];

$sql= "
    SELECT price, category
    FROM items 
    WHERE ID = $id;
    ";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$price = $row['price'];
$category = $row['category'];

array_push($_SESSION['total-price'],$price);
array_push($_SESSION['cart'], $id);


if ($category == 'indoor') {
  header("location: indoor_shop.php#$id");
} else {
  header("location: outdoor_shop.php#$id");
}

