    <!--
    Author: Jada Goring, Sadalia Bovell & Alexa-Rae Field
    -->
<?php
include "templates/header.php";
$connect = mysqli_connect("localhost", "root", "", "cart_system");

function debug_to_console($data)
{
  $output = $data;
  if (is_array($output))
    $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

if (isset($_POST["checkout"])) {
  if (isset($_SESSION["shopping_cart"])) {
    $name = $_POST["firstname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phonenumber = $_POST["phone"];
    $parish = $_POST["parish"];
    $paymethod = 'Cod';

    $sql = "INSERT INTO orders ( name, email, phone, address, pay_method)
    VALUES ( '$name',  '$email', '$phonenumber', '$address', '$paymethod')";

    if ($connect->query($sql) === TRUE) {
      $last_id = $connect->insert_id;
    } else {
      echo "Error: " . $sql . "<br>" . $connect->error;
    }

    foreach ($_SESSION["shopping_cart"] as $keys => $values) {

      $itemid = $values["item_id"];
      $orderid = $last_id;
      $amount = $values["item_quantity"];

      $sql2 = "INSERT INTO order_info ( order_id, product_id, amt)
        VALUES ( '$orderid',  '$itemid', '$amount')";

      if ($connect->query($sql2) === TRUE) {
        echo '<script> alert("New record created successfully")</script>';
        echo '<script>window.location="checkout.php"</script>';
        
      } else {
        echo "Error: " . $sql2 . "<br>" . $connect->error;
      }
    }
  }
}
?>
<div class="checkout-header">
  <div class="seperator-div"></div>
  <h2 class="checkout-hdr">Order Checkout Form</h2>
</div>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="POST" action="checkout.php">

        <div class="col-25">
          <div class="container">
            <h4>Cart <span class="price"></span></h4>
            <table>
              <tr>
                <th style="text-align:left">Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Sub-Total</th>
              </tr>
              <?php
              if (!empty($_SESSION["shopping_cart"])) {
                $total = 0;
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
              ?>
                  <tr>
                    <td><?php echo $values["item_name"]; ?></td>
                    <td style="padding-left: 20px;"><?php echo $values["item_quantity"]; ?></td>
                    <td style="padding-left: 20px;">$ <?php echo $values["item_price"]; ?></td>
                    <td style="padding-left: 20px;">$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                  </tr>
                <?php
                  $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }

                ?>

                <hr>
                <tr>
                  <tds>
                    <p>Total(BBD): <b>$ <?php echo number_format($total, 2);
                                      } ?></b></p>
                    </td>
                </tr>
            </table>
          </div>
        </div>





        <div class="row">
          <div class="billing-tbl">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input class="textbox" type="text" id="fname" name="firstname" placeholder="John M. Doe" required> <br>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input class="textbox" type="text" id="email" name="email" placeholder="john@example.com" required><br>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input class="textbox" type="text" id="adr" name="address" placeholder="Vauxhall" required><br>
            <label for="adr"><i class="fas fa-phone-square-alt"></i> Telephone No.</label>
            <input class="textbox" type="number" id="phone" name="phone" placeholder="0000000" required><br>
            <label for="city"><i class="fa fa-institution"></i> Parish</label>
            <input class="textbox" type="text" id="parish" name="parish" placeholder="Christ Church" required><br>


          </div>
        </div>


    </div>
  </div>
</div>
<label>
  <input type="checkbox" name="COD" style="margin-left: 20px;" required> Cash On Delivery(COD)
</label>
<br>
<input type="submit" value="Complete Order" name="checkout" class="btn btn-success" style="margin-left: 20px; width: 300px;">
</form>
<a href="shoppingcart.php"><button class="btn btn-danger" style="margin-left: 350px;width: 300px;">Cancel Order</button></a>
</div>
</div>

</div>

</body>

</html>

