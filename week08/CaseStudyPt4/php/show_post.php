<?php
  var_dump($_POST);


echo "<br>";


foreach ($_POST as $key => $value) {

  echo $key;
  echo "\n";
  echo (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);
  echo "\n ";
  echo $value;
  echo "|";
}

echo "<br>";

reset($_POST); //reset it first
$key = key($_POST);

echo $key;

echo "<br>";

echo end($_POST);




