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
$sql = "SELECT COUNT(*) FROM coffee;";
$result = $conn->query($sql);
$cnt = intval($result->fetch_assoc()["COUNT(*)"]);

for ($x = 1; $x <= $cnt; $x++) {
    $amt = 0;
    $sql = "select sale.*, saleAmount.amount, c.coffee_id, c.coffee_name, c.type, c.price from saleAmount
                        join
                            sale on saleAmount.sale_id = sale.sale_id
                        left join
                            coffee c on saleAmount.coffee_id = c.coffee_id
                        where
                            c.coffee_id = $x;";

    $result = $conn->query($sql);
    $name = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $amt += intval($row["amount"]);
            $name = $row["coffee_name"];
        }


    } else {
        echo "0 results";
    }

    echo $name." ".$amt."\n";


}

/*

$sql = "SELECT * FROM f32ee.coffee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $name = "";
    while($row = $result->fetch_assoc()) {
        if($row["coffee_name"] != $name) {
            echo "\n";
        }

        echo "name: " . $row["coffee_name"] . " - type: " . $row["type"] . " - ". $row["description"] ."|";

        if($row["description"] == '')
            echo "aaaaaaa";

        $name = $row["coffee_name"];

    }
} else {
    echo "0 results";
}*/



$conn->close();
?>
