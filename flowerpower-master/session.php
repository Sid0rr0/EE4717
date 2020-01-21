<?php
session_start();

if ( !isset($_SESSION["cart"]) ) {
  $_SESSION["cart"] = array();
}
if ( !isset($_SESSION["total-price"]) ) {
  $_SESSION["total-price"] = array();
}
?>

