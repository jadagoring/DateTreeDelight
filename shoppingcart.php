<?php
include "templates/header.php";
$app -> customerpage();
$connect = mysqli_connect("localhost", "root", "", "cart_system");

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="shoppingcart.php"</script>';
            }
        }
    }
    elseif ($_GET["action"] == "deleteAll") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                unset($_SESSION["shopping_cart"][$keys]);
        }
        echo '<script>alert("Items Removed")</script>';
        echo '<script>window.location="shoppingcart.php"</script>';
    }
}
?>

<div class="shopcart-header">
    <div class="seperator-div"></div>
    <h1 class="shopcart-hdr">Shopping Cart</h1>
</div>

<div class="shopcart-body">
    <h3 class="shopcart-h">Order Details</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>
            <?php
            if (!empty($_SESSION["shopping_cart"])) {
                $total = 0;
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            ?>
                    <tr>
                        <td style="text-align: left;"><?php echo $values["item_name"]; ?></td>
                        <td style="text-align: center;"><?php echo $values["item_quantity"]; ?></td>
                        <td style="text-align: right;">$ <?php echo $values["item_price"]; ?></td>
                        <td style="text-align: right;">$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                        <td style="text-align: center;"><a href="shoppingcart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="fas fa-trash" style="color:#B22222"></i></a></td>
                    </tr>
                <?php
                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
                ?>
                <tr>
                    <td colspan="3" style="text-align:left">SubTotal(BBD):</td>
                    <td style="text-align:right">$ <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:left">VAT(17.5%):</td>
                    <td style="text-align:right">$ <?php echo number_format($total, 2) * 0.175; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:left">Total(BBD):</td>
                    <td style="text-align:right">$ <?php echo number_format($total, 2) + number_format($total, 2) * 0.175; ?></td>
                    <td></td>
                </tr>
            <?php
            }
            ?>

        </table>

        <div class="table-responsive">
            <table style="width: 100%">
                <tr style="text-align: center">
                    <td>
                        <a href="checkout.php"><button type="button" class="btn btn-success">Checkout</button>
                    </td>
                    <td>
                        <a href="shoppingcart.php?action=deleteAll"><button type="button" class="btn btn-danger">Clear all</button></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include "templates/footer.php"; ?>