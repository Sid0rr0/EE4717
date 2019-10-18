<?php
$servername = "localhost";
$username = "newuser";
$password = "password";
$dbname = "f32ee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM f32ee.coffee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $name = "";
    while($row = $result->fetch_assoc()) {
        if($row["coffee_name"] != $name) {
            echo "\n";
        }

        echo "name: " . $row["coffee_name"] . " - type: " . $row["type"] . "|";

        $name = $row["coffee_name"];

    }
} else {
    echo "0 results";
}



$conn->close();
?>
