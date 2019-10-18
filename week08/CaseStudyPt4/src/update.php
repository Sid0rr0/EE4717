<!DOCTYPE html>
<html lang="en">
<head>
    <title>Case Study Part 4</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type = "text/css" href="../css/style.css">
    <link rel="stylesheet" type = "text/css" href="../css/coffeeMenu.css">
    <link rel="stylesheet" type = "text/css" href="../css/update.css">
</head>
<body>

<div class="grid-container">

    <div class="item1">
        <img src="../media/logo.png" alt="logo">
        <!-- picture from https://www2.bc.edu/michael-adjibodou/Home.html -->
    </div>

    <div class="item2">
        <ul class="nav-menu productPriceUpdate">
            <li><a href="#">Product Price Update</a></li> <!--&nbsp; -->
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
                    $cnt = 0;
                    $id = 0;
                    while($row = $result->fetch_assoc()) {

                        if($row["description"] == '') {
                            $arr[$cnt] = $row["type"]." $".$row["price"];
                            $id++;
                        } else {

                            echo '<tr>
                                    <td>
                                        <form action="#" class="menuForm" >
                                            <label for="checkbox'.$cnt.'"><input type="checkbox" name="amount" id="checkbox'.$cnt.'" value="item'.$cnt.'"></label>
                                        </form>
                                    </td>';
                                echo '<td class="menuName">'.$row["coffee_name"].'</td>';
                                echo '<td>'.$row["description"].'<br/>';
                                    foreach( $arr as $value ) {
                                        echo "$value";
                                    }
                                    echo $row["type"]." $".$row["price"];
                                echo '</td>';
                            echo "</tr>";
                            $cnt++;
                            $id = 0;
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
