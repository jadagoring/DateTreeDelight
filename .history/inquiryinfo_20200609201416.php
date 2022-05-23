<?php
include "templates/header.php";
$app->employeepage();
$connect = mysqli_connect("localhost", "root", "", "cart_system");
$id = $_POST["id"];

$query = "SELECT * FROM inquirylog WHERE id = $id";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $subject = $row["subject"];
        $info = $row["info"];
        $email = $row['email'];
    }
}
if (isset($_POST["checkout"])) {

        
		$sql = "UPDATE inquirylog SET completed = 1 WHERE id = $id";

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
?>

<div class="inq-info-header">
    <div class="seperator-div"></div>
    <h2 class="inq-info-hdr">Inquiry Info</h2>
</div>

<div class="inq-info-body">
    <h2>Email</h2>
    <p><i><?php echo $email ?></i></p>

    <h2>Subject</h2>
    <p><?php echo $subject; ?></p>

    <h2>Message</h2>
    <p><i><?php echo $info ?></i></p>

    <form action="inquiryinfo.php" method="POST" enctype="text/plain">
        <input type="submit" class="btn btn-success contact-form-button">
    </form>
</div>

<?php include "templates/footer.php"; ?>