<?php
include "templates/header.php";
$connect = mysqli_connect("localhost", "root", "", "cart_system");

if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_POST["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'            =>    $_POST["id"],
                'item_name'            =>    $_POST["hidden_name"],
                'item_price'        =>    $_POST["hidden_price"],
                'item_quantity'        =>    $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
            echo '<script>window.location="menu.php"</script>';
        } else {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="menu.php"</script>';
        }
    } else {
        $item_array = array(
            'item_id'            =>    $_POST["id"],
            'item_name'            =>    $_POST["hidden_name"],
            'item_price'        =>    $_POST["hidden_price"],
            'item_quantity'        =>    $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="menu.php"</script>';
            }
        }
    }
}

?>

<div class="menu-header">
    <div class="seperator-div"></div>
    <h1 class="menu-hdr">Menu</h1>
</div>

<div class="menu-body">
    <div class="container">
        <br />
        <br />
        <br />
        <h3 class="center menu-title"> Snacks</h3><br />
        <br /><br />
        <div class="row center">
            <?php
            $query = "SELECT * FROM tbl_snacks ORDER BY id ASC";
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <div class="col-md-4">
                        <form method="post" action="menu.php">
                            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" class="center">
                                <img src="assets/images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

                                <h4 class="text-info"><?php echo $row["name"]; ?></h4>

                                <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

                                <input type="text" name="quantity" value="1" class="form-control" />

                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />

                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

                            </div>
                        </form>
                    </div>
            <?php
                }
            }
            ?>
        </div>



        <div class="container">
            <br />
            <br />
            <br />
            <h3 class="center menu-title">Alcohol</h3><br />
            <br /><br />
            <div class="row center">
                <?php
                $query = "SELECT * FROM tbl_alcohol ORDER BY id ASC";
                $result = mysqli_query($connect, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <div class="col-md-4">
                            <form method="post" action="menu.php">
                                <div class="center" style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;">
                                    <img src="assets/images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

                                    <h4 class="text-info"><?php echo $row["name"]; ?></h4>

                                    <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

                                    <input type="text" name="quantity" value="1" class="form-control" />

                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />

                                    <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

                                </div>
                            </form>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <table>
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Delete</th>
                </tr>
                <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                ?>
                        <tr>
                            <td><?php echo $values["item_name"]; ?></td>
                            <td style="text-align:center"><?php echo $values["item_quantity"]; ?></td>
                            <td style="text-align:right">$ <?php echo $values["item_price"]; ?></td>
                            <td style="text-align:right">$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                            <td style="text-align:center"><a href="menu.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="fas fa-trash" style="color:#B22222"></i></a></td>
                        </tr>
                    <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                    ?>
                    <tr>
                        <td colspan="3" style="text-align:left">Total(BBD):</td>
                        <td style="text-align:right">$ <?php echo number_format($total, 2); ?></td>
                        <td></td>
                    </tr>
                <?php
                }
                ?>

            </table>
        </div>
        <div class="t" style="width: 100%; text-align: center;"> <a href="shoppingcart.php"><button class="checkout-btn">Checkout</button></a> </div>
        
    </div>
</div>
</div>

<?php include "templates/footer.php"; ?>