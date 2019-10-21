<?php
include('../php/credentials.php');

$submit = end($_POST);

foreach ($_POST as $key => $value) {

    if($value == $submit)
        break;

    $int = (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);

    $sql = "UPDATE coffee SET price = ".(double)$value." WHERE coffee_id = ".$int;

    $conn->query($sql);

}

$conn->close();

echo '<script>window.location.href = "../src/update.php";</script>';

