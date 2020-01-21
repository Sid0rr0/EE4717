<?php
include 'session.php';
include_once 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/script.js" defer></script>
    <title>Flower Power</title>
</head>
<body onload="calculateTotalPrice(<?php echo count(array_count_values($_SESSION['cart'])) ?>)">
<div class="allButFooter">
<nav id="top-nav">
    <span class="padding-span">
    <a  href="shop.php">Shop</a>
    </span>
    <span class="padding-span">
    <a href="about.php">About us</a>
    </span>
    <span class="padding-span">
    <a href="index.php">Flower Power</a>
    </span>
    <span class="padding-span">
    <a href="contact.php">Contact us</a>
    </span>
    <span class="padding-span">
    <a class="active-page" href="cart.php"><?php echo array_sum($_SESSION['total-price']) ?> $</a>
    </span>
</nav>
<div id="cart-wrap">
    <div id="cart">
      <?php
      $whereIn = implode(',', $_SESSION['cart']);
      $sql = "
                SELECT * FROM items
                WHERE id IN ($whereIn)
      ";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      //echo $sql;
      ?>
        <div class="shop-banner">
            <h2>My cart</h2>
        </div>
        <table id="table">
            <tbody>
            <tr>
                <th width="70%">Description</th>
                <th width="10%">Quantitiy</th>
                <th width="10%">Unit Price</th>
                <th width="10%">Price</th>
            </tr>
            <tr>
                <td colspan="4">
                    <hr/>
                </td>
            </tr>
            <?php
            $i=0;

            $count_quantities = array_count_values($_SESSION['cart']);

            //print_r($count_quantities);

            if ($resultCheck > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $key = $row['ID']
                ?>
                  <tr>
                      <td style="flex-direction: row">
                          <div class="cart-image">
                              <img alt="flower" src=<?php echo "assets/products/" . strtolower(str_replace(' ', '',
                                      $row['name'])) . ".jpg" ?> >
                          </div>
                          <div class="cart-desc">
                              <p>
                                <?php echo $row['name'] ?>
                              </p>
                              <p style="font-size: 14px "> From category <?php echo $row['category'] ?>.</p>
                              <br/>
                              <a href="remove_item.php?id=<?php echo $row['ID'] ?>">Remove item</a>
                          </div>
                      </td>
                      <td><input id="<?php echo $i ?>" style="font-size: 13px;" type="number"
                                 onclick="calculateSumTotalPrice(<?php echo count(array_count_values($_SESSION['cart'])) ?>)"
                                 onchange="calculateTotalPrice(<?php echo count(array_count_values($_SESSION['cart'])) ?>)"
                                 value="<?php echo $count_quantities[$key]; ?>"
                                 min="1"></td>
                      <td id="price<?php echo $i;?>" style="font-size: 18px;"><?php echo $row['price'] ?>$</td>
                      <td id="totalPrice<?php echo $i;?>"></td>
                  </tr>
                  <tr>
                      <td colspan="4">
                          <hr/>
                      </td>
                  </tr>
              <?php $i++; } ?>
                <tr>
                    <td id="sumTotal" colspan="4" align="right">Total Price: 0$</td>
                </tr>
              <?php
            }
            mysqli_close($conn);
            ?>
            </tbody>
        </table>
      <?php
      if (empty($_SESSION['total-price'])) {
        echo "<div class='empty-cart'> <h2> Your cart seems to be empty 😔</h2></div>";
      } ?>
        <div id="cart-checkout">
            <h2>Checkout details</h2>
            <!-- action="confirmation.php" -->
            <form id="checkoutForm" name='checkoutForm' onsubmit="return validateCheckout()" novalidate method="post" action="confirmation.php" >
           <!-- <form id="cartForm" novalidate> -->
                <label>
                    <input placeholder="First name"
                           onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'First name'"
                           name="name"
                           id="name"
                           onchange="validateName()"
                    >
                </label>
                <label>
                <input placeholder="Surname"
                       onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'Surname'"
                       name="surname"
                       id="surname"
                       onchange="validateName()"
                >
                </label>
                <label>
                    <input placeholder="Email"
                           onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Email'"
                           name="email"
                           id="email"
                           onchange="validateEmail()"
                    >
                </label>
                <label>
                    <input placeholder="Address"
                           onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Address'"
                           name="address"
                           id="address"
                           onchange=""
                    >
                </label>
                <label>
                    <input placeholder="Card number"
                           onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Card number'"
                           name="card-number"
                           id="card-number"
                           onchange="validateCard()"
                    >
                </label>
                <label>
                    <input
                           name="expiry-date"
                           type="Month"
                           id="expiry-date"
                           onchange="validateTime()"
                    >
                </label>
                <div id="make-purchase">
                <button id="make-purchase" type="submit">Confirm purchase</button>
                </div>
            </form>
        </div>
        <div class="cart-buttons">
            <button onclick="window.location='./shop.php';">Continue Shopping</button>

          <?php
          if (!empty($_SESSION['cart'])) {
            echo "<button id='switchButton' onclick='showCheckout()'>Proceed to checkout</button>";
          } ?>
        </div>

    </div>
</div>
</div>
<footer>
    <div>
        Copyright © 2019 - 2019 Flower Power <br>
        <a href="mailto:info@flowerpower.com" id="mail">info@flowerpower.com</a>
    </div>
</footer>
</body>
</html>
