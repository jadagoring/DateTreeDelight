    <!--
    Author: Jada Goring, Sadalia Bovell & Alexa-Rae Field
    Purpose: This page will allow ALL users to access the orders
    -->
<?php
include "templates/header.php";
$app -> employeepage();
$connect = mysqli_connect("localhost", "root", "", "cart_system");
?>

<div class="order-header">
    <div class="seperator-div"></div>
    <h2 class="order-hdr">Orders</h2>
</div>

<div class="order-body" style="margin-left: 200px;">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Order Date</th>
            <th>See More</th>
        </tr>

        <?php
        $query = "SELECT * FROM orders WHERE finished = 0 ORDER BY id ASC";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["order_date"]; ?></td>
                    <td style="text-align: center;"><a href="order-info.php?id=<?php echo $row["id"] ?>"><i class="fas fa-arrow-right" style=" color: green;"></i></a></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>

</div>

<?php include "templates/footer.php"; ?>