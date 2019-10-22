<!DOCTYPE html>
<html lang="en">
<head>
    <title>Case Study Part 4</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type = "text/css" href="../css/style.css">
    <link rel="stylesheet" type = "text/css" href="../css/coffeeMenu.css">
    <link rel="stylesheet" type = "text/css" href="../css/sales.css">
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
        <h1>Click to generate sales by products</h1>

        <div class="salesParentDiv">
            <div class="checkbox">
                <form action="#" class="menuForm" >
                    <label for="checkbox1"><input type="checkbox" name="amount" id="checkbox1" value="item1" onchange=""></label>
                </form>
            </div>
            <div class="notCheckbox">
                <h1>Total dollar sales by products</h1>
            </div>
        </div>

        <div class="salesParentDiv">
            <div class="checkbox">
                <form action="#" class="menuForm" >
                    <label for="checkbox2"><input type="checkbox" name="amount" id="checkbox2" value="item2" onchange=""></label>
                </form>
            </div>
            <div class="notCheckbox">
                <h1>Sales quantity by product categories</h1>
            </div>
        </div>

    </div>

    <div class="item4">
        Copyright &copy; 2019 JavaJam Coffeee House <br/>
        <a href="mailto:thanhhung@le.com" id="mail">thanhhung@le.com</a>
    </div>

</div>

</body>
</html>

