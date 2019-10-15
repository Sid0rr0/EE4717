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
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["coffee_id"]. " - name: " . $row["coffee_name"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
