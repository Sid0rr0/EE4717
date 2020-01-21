<?php
include 'session.php';
include 'db_connection.php';

$id = $_GET['id'];

$sql= "
    SELECT price
    FROM items 
    WHERE ID = $id;
    ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$price = $row['price'];


print_r($_SESSION['cart']);

$new_price_arr=array_diff($_SESSION['total-price'],[$price]);
$_SESSION['total-price'] = $new_price_arr;

$new_item_arr=array_diff($_SESSION['cart'],[$id]);
$_SESSION['cart'] = $new_item_arr;

header("location: cart.php");

