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
$category = "";
for ($x = 1; $x <= 3; $x++) {
    switch ($x) {
        case 1:
            $category = "Endless Cup";
            break;
        case 2:
            $category = "Single";
            break;
        case 3:
            $category = "Double";
            break;
        default:
            $category = "";
    }

    $sql = "select sale.*, saleAmount.amount, c.coffee_id, coffee_name, type, price from saleAmount
                    join
                        sale on saleAmount.sale_id = sale.sale_id
                    left join
                        coffee c on saleAmount.coffee_id = c.coffee_id
                    where c.type = '$category;'";
    //echo $sql;
    $result = $conn->query($sql);


    echo "<div id='category".$x."'>";
    echo "<h2>$category</h2><br>";
    $total = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $total = doubleval($row["amount"])*doubleval($row["price"]);
        }
    } else {
        echo "0 results";
    }
    echo $total;
    echo "</div>";
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
