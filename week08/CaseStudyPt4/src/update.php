<!DOCTYPE html>
<html lang="en">
<head>
    <title>Case Study Part 4</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type = "text/css" href="../css/style.css">
    <link rel="stylesheet" type = "text/css" href="../css/coffeeMenu.css">
    <link rel="stylesheet" type = "text/css" href="../css/update.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script rel="javascript" src="../js/update.js"></script>
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
        <h1>Coffee at JavaJam</h1>
        <table class="coffee-menu">
            <?php
                include('../php/credentials.php');
                $sql = "SELECT * FROM f32ee.coffee";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $arr = [];
                    $cnt = 1;
                    while($row = $result->fetch_assoc()) {
                        $id = $row['coffee_id'];
                        if($row["description"] == '') {
                            $arr[$cnt] = array($row["type"], $row["price"], $id);
                        } else {
                            echo '<tr>
                                    <td>
                                        <form action="#" class="menuForm" >
                                            <label for="checkbox'.$cnt.'"><input type="checkbox" name="amount" id="checkbox'.$cnt.'" value="'.$cnt.'item" onchange="updateItem(event)"></label>
                                        </form>
                                    </td>';
                                echo '<td class="menuName">'.$row["coffee_name"].'</td>';
                                echo '<td>'.$row["description"].'<br/>';

                                echo '<form action="../php/update_data.php" method="POST" class="newPriceForm" id="newPriceForm'
                                            .$cnt.'">';
                                    foreach( $arr as $value ) {
                                        echo "$value[0]"." $"."$value[1]".'
                                                <label for="newPrice'.$value[2].'"></label>
                                                <input class="newPriceRow newPriceRow'.$cnt.'" name="newPrice'.$value[2]
                                            .'" id="newPrice'
                                        .$value[2].'" type="number" min="0" step="0.01" value="'.$value[1].'">';
                                    }
                                    echo " ".$row["type"]." $".$row["price"].'
                                            <label for="newPrice'.$id.'"></label>
                                            <input class="newPriceRow newPriceRow'.$cnt.'" name="newPrice'.$id.'" id="newPrice'.$id.'" type="number"  step="0.01" min="0" value="'.$row["price"].'">
                                            <input class="newPriceRow newPriceRow'.$cnt.'" name="submit'.$cnt.'" type="submit" id="newPriceButton'.$cnt.'" value="Update""> 
                                        </form>';
                                echo '</td>';
                            echo "</tr>";
                            $cnt++;
                            $arr = [];
                        }
                    }
                } else {
                    echo "Sorry, no coffee on the menu.";
                }
                $conn->close();
            ?>

        </table>
    </div>

    <div class="item4">
        Copyright &copy; 2019 JavaJam Coffeee House <br/>
        <a href="mailto:thanhhung@le.com" id="mail">thanhhung@le.com</a>
    </div>

</div>

</body>
</html>

