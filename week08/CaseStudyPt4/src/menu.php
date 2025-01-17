<!DOCTYPE html>
<html lang="en">
<head>
    <title>Case Study Part 4</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/coffeeMenu.css">
    <script rel="javascript" src="../js/menuPrices.js"></script>
</head>
<body>

<div class="grid-container">

    <div class="item1">
        <a href="../index.html"> <img src="../media/logo.png" alt="logo"> </a>
        <!-- picture from https://www2.bc.edu/michael-adjibodou/Home.html -->
    </div>

    <div class="item2">
        <ul class="nav-menu">
            <li><a href="../index.html">Home</a></li> <!--&nbsp; -->
            <li><a href="menu.php">Menu</a></li>
            <li><a href="music.html">Music</a></li>
            <li><a href="jobs.html">Jobs</a></li>
        </ul>
    </div>

    <div class="item3">
        <h1>Coffee at JavaJam</h1>
        <table class="coffee-menu">
            <tr>
                <td class="menuName">Just Java</td>
                <td>Regular house blend, decaffeinated coffee, or flavor of the day. <br/>
                    Endless Cup $2.00</td>
                <td class="menuPrice">
                    <label for="item1"></label>
                    <input id="item1" type="number" min="0" onchange="updateItem1(event)">
                </td>
                <td class="menuPrice">
                    <div id="item1Price">$0</div>
                </td>
            </tr>
            <tr>
                <td class="menuName">Cafe au Lait</td>
                <td>House blended coffee infused into a smooth, steamed milk. <br/>
                    <form action="#" class="menuForm" >
                        <label for="item2Radio1"><input type="radio" name="amount" id="item2Radio1" value="single" onchange="updateItem2(event)" checked="checked">
                            Single $2.00</label>
                        <label for="item2Radio2"><input type="radio" name="amount" id="item2Radio2" value="double" onchange="updateItem2(event)">
                            Double $3.00</label>
                    </form>
                </td>
                <td class="menuPrice">
                    <label for="item2"></label>
                    <input id="item2" type="number" min="0" onchange="updateItem2(event)">
                </td>
                <td class="menuPrice">
                    <div id="item2Price">$0</div>
                </td>
            </tr>
            <tr>
                <td class="menuName">Iced Cappuccino</td>
                <td>Sweetened espresso blended with icy-cold milk and served in chilled glass <br/>
                    <form action="#" class="menuForm">
                        <label for="item3Radio1"><input type="radio" name="amount" id="item3Radio1" value="single"
                                                        checked="checked" onchange="updateItem3(event)">
                            Single $4.75</label>
                        <label for="item3Radio2"><input type="radio" name="amount" id="item3Radio2" value="double"
                                                        onchange="updateItem3(event)">
                            Double $5.75</label>
                    </form>
                </td>
                <td class="menuPrice">
                    <label for="item3"></label>
                    <input id="item3" type="number" min="0" onchange="updateItem3(event)">
                </td>
                <td class="menuPrice">
                    <div id="item3Price">$0</div>
                </td>
            </tr>
            <tr id="menuTotal">
                <td></td>
                <td id="totalPriceText">
                    Total price
                </td>
                <td colspan="2" class="menuPrice">
                    <div id="totalPrice">$0</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="item4">
        Copyright &copy; 2019 JavaJam Coffeee House <br/>
        <a href="mailto:thanhhung@le.com" id="mail">thanhhung@le.com</a>
    </div>

</div>

</body>
</html>
