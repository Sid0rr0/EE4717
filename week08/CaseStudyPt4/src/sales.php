<!DOCTYPE html>
<html lang="en">
<head>
    <title>Case Study Part 4</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type = "text/css" href="../css/style.css">
    <link rel="stylesheet" type = "text/css" href="../css/coffeeMenu.css">
    <link rel="stylesheet" type = "text/css" href="../css/sales.css">
    <script rel="javascript" src="../js/update.js"></script>
    <script rel="javascript" src="../js/sales.js"></script>
</head>
<body>

<div class="grid-container">

    <div class="item1">
        <a href="../index.html"> <img src="../media/logo.png" alt="logo"> </a>
        <!-- picture from https://www2.bc.edu/michael-adjibodou/Home.html -->
    </div>

    <div class="item2">
        <ul class="nav-menu productPriceUpdate">
            <li><a href="update.php">Product Price Update</a></li>
            <li><a href="sales.php">Daily Sales Report</a></li>
            <!--<li><a href="menu.html">Menu</a></li>
            <li><a href="music.html">Music</a></li>
            <li><a href="jobs.html">Jobs</a></li>-->
        </ul>
    </div>

    <div class="item3">
        <h1>Click to generate sales by products</h1>

        <div class="salesParentDiv">
            <div class="checkbox">
                <form action="#" class="menuForm" >
                    <label for="checkbox1"><input type="checkbox" name="amount" id="checkbox1" value="1item"
                                                  onchange="showData(event)"></label>
                </form>
            </div>
            <div class="notCheckbox">
                <h1>Total dollar sales by products</h1>
            </div>
            <div class="saleDiv" id="saleDiv1">
                <?php

                include('../php/credentials.php');

                $sql = "SELECT COUNT(*) FROM coffee;";
                $result = $conn->query($sql);
                $cnt = intval($result->fetch_assoc()["COUNT(*)"]);
                $name = "";
                $category = "";
                $id = "";
                $total = 0;
                $amt = 0;
                $totaltotal = 0;

                for ($x = 1; $x <= $cnt; $x++) {
                    $sql = "select sale.*, saleAmount.amount, c.coffee_id, c.coffee_name, c.type, c.price from saleAmount
                        join
                            sale on saleAmount.sale_id = sale.sale_id
                        left join
                            coffee c on saleAmount.coffee_id = c.coffee_id
                        where
                            c.coffee_id = $x;";
                    $result = $conn->query($sql);

                    $amt = 0;
                    $price = 0;

                    $new = false;
                    if ($result->num_rows > 0) {
                        $amtPrice = 0;
                        while ($row = $result->fetch_assoc()) {

                            if($name != $row["coffee_name"]) {
                                $new = true;
                                echo "<br>";
                            }

                            $amt += intval($row["amount"]);
                            $price = doubleval($row["price"]);
                            $amtPrice += $price*intval($row["amount"]);

                            $name = $row["coffee_name"];
                            $category = $row["type"];
                        }
                        $totaltotal+= $amtPrice;

                        if($new == true) {
                            $total = 0;
                            $total += $amtPrice;
                            $new = false;
                            echo $name." ".$category." ".$amt." x $".$price." = $".$amtPrice."<br>";

                        } else {
                            $total += $amtPrice;
                            echo $name." ".$category." ".$amt." x $".$price." = $".$amtPrice."<br><b>Total: $".$total
                                ."</b><br>";
                        }
                    } else {
                        echo "0 results";
                    }
                }
                echo "<br><h3>TOTAL: $".$totaltotal."</h3>";
                $conn->close();
                ?>
            </div>
        </div>

        <div class="salesParentDiv">
            <div class="checkbox">
                <form action="#" class="menuForm" >
                    <label for="checkbox2"><input type="checkbox" name="amount" id="checkbox1" value="2item"
                                                  onchange="showData(event)"></label>
                </form>
            </div>
            <div class="notCheckbox">
                <h1>Sales quantity by product categories</h1>
            </div>
        </div>
        <div class="saleDiv" id="saleDiv2">
            <h2>Sold Today:</h2>
            <?php

            include('../php/credentials.php');
            $sql = "select sale.*, saleAmount.amount, c.coffee_id, coffee_name, type, price from saleAmount
                    join
                        sale on saleAmount.sale_id = sale.sale_id
                    left join
                        coffee c on saleAmount.coffee_id = c.coffee_id;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo $row['dt']." ";
                    echo $row['amount']." ";
                    echo $row['coffee_name']." ";
                    echo $row['type']." ";
                    echo $row['price']."<br>";
                }
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <div class="item4">
        Copyright &copy; 2019 JavaJam Coffeee House <br/>
        <a href="mailto:thanhhung@le.com" id="mail">thanhhung@le.com</a>
    </div>

</div>

</body>
</html>
