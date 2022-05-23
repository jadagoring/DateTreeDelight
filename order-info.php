<?php
include "templates/header.php";
$app -> employeepage();
$connect = mysqli_connect("localhost", "root", "", "cart_system");
$id = $_GET["id"];

if (isset($_POST['Checkout'])) {
    $sql = "UPDATE orders SET finished=1 WHERE id = $id";
    if ($connect->query($sql) === TRUE) {
        echo "<script> alert('You have successfully checked out the order.') </script>";
        echo "<script> location.href='order.php' </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
else if (isset($_POST['Delete'])) {

    $id2 = $_GET["id"];
    $delete = "DELETE FROM orders WHERE id = $id2";
    $delete2 = "DELETE FROM order_info WHERE order_id = $id2";

    if($connect->query($delete) === TRUE && $connect->query($delete2) === TRUE)
    {
        echo '<script>alert("Order Removed")</script>';
        echo '<script>window.location="order.php"</script>';
    }    
    else{
        echo 'Error Deleting Order: ' . $connect->error;
    }
}
?>

<div class="order-info-header">
    <div class="seperator-div"></div>
    <h1 class="order-info-hdr">Order info</h1>
    <h2 style="color: white;margin-left: 200px;margin-top: 100px">ORDER: <?php echo $_GET["id"]; ?></h2>
</div>

<div class="order-info-body" style="margin-left: 200px;">
    <table>
        <tr>
            <th>Product Name</th>
            <th>Amount</th>
            <th>Price</th>
        </tr>

        <?php
        $idnew = $_GET['id'];

        $query = "SELECT * FROM order_info WHERE order_id=$idnew";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $pid = $row['product_id'];
                $query2 = "SELECT * FROM tbl_snacks WHERE id=$pid ";
                $r2 = mysqli_query($connect, $query2);
                while ($row2 = mysqli_fetch_array($r2)) {

        ?>
                    <tr>
                        <td><?php echo $row2["name"]; ?></td>
                        <td><?php echo $row["amt"]; ?></td>
                        <td><?php echo $row2["price"]; ?></td>
                    </tr>
        <?php
                }
            }
        }
        ?>
    </table>
    <form method="post" action="order-info.php?id=<?php echo $id ?>">
        <input type="submit" name="Checkout" value="Checkout" class="btn btn-success" style="width: 300px;">
        <input type="submit" name="Delete" value="Delete" class="btn btn-danger" style="width: 300px;">
    </form>
    <div class="seperator-div"></div>
</div>

<?php include "templates/footer.php"; ?>