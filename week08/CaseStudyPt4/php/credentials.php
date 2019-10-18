<?php
$servername = "localhost";
$username = "newuser";
$password = "password";
$dbname = "f32ee";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
