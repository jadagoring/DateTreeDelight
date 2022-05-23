<?php
include "templates/header.php";
$app->employeepage();
$connect = mysqli_connect("localhost", "root", "", "cart_system");

if (isset($_POST["chng_amnt"])) {
    $nid = $_POST["id"];
    $namnt = $_POST["newamnt"];

    $sql = "UPDATE tbl_snacks SET amount = $namnt WHERE id = $nid";

    if ($connect->query($sql) === TRUE) {

        echo '<script> alert("Inventory edited successfully")</script>';
        echo '<script>window.location="inventory.php"</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
} else if (isset($_POST["chng_amnt2"])) {
    $nid = $_POST["id"];
    $namnt = $_POST["newamnt"];

    $sql = "UPDATE tbl_alcohol SET Amount = $namnt WHERE id = $nid";

    if ($connect->query($sql) === TRUE) {

        echo '<script> alert("Inventory edited successfully")</script>';
        echo '<script>window.location="inventory.php"</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
} else if (isset($_POST["delete_snack"])) {
    $nid = $_POST["id"];

    $sql = "DELETE FROM  tbl_snacks WHERE id = $nid";

    if ($connect->query($sql) === TRUE) {

        echo '<script> alert("Inventory item deleted successfully.")</script>';
        echo '<script>window.location="inventory.php"</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
} else if (isset($_POST["delete_alc"])) {
    $nid = $_POST["id"];
    $namnt = $_POST["newamnt"];

    $sql = "DELETE FROM tbl_alcohol WHERE id = $nid";

    if ($connect->query($sql) === TRUE) {

        echo '<script> alert("Inventory item deleted successfully.")</script>';
        echo '<script>window.location="inventory.php"</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
} else if (isset($_POST["new_snack"])) {
    $target_dir = "assets/images/";
    $target_file = $target_dir . basename($_POST["name"] . ".jpg");
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    $name = $_POST["name"];
    $price = $_POST["price"];
    $amount = $_POST["amount"];
    $image = $_POST["name"] . ".jpg";

    $sql = "INSERT INTO tbl_snacks ( name, image, price, amount)
    VALUES ( '$name',  '$image', '$price', '$amount')";

    if ($connect->query($sql) === TRUE) {
        echo "<script> alert('Item added successfully') </script>";
        echo "<script> window.location='inventory.php' </script>";
    } else {
        echo "<script> alert('Item not added, please try again later.') </script>";
        echo "<script> window.location='inventory.php' </script>";
    }
} else if (isset($_POST["new_alc"])) {
    $target_dir = "assets/images/";
    $target_file = $target_dir . basename($_POST["name"] . ".jpg");
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    $name = $_POST["name"];
    $price = $_POST["price"];
    $amount = $_POST["amount"];
    $image = $_POST["name"] . ".jpg";

    $sql = "INSERT INTO tbl_alcohol ( name, image, price, amount)
    VALUES ( '$name',  '$image', '$price', '$amount')";

    if ($connect->query($sql) === TRUE) {
        echo "<script> alert('Item added successfully') </script>";
        echo "<script> window.location='inventory.php' </script>";
    } else {
        echo "<script> alert('Item not added, please try again later.') </script>";
        echo "<script> window.location='inventory.php' </script>";
    }
}

?>

<div class="inv-header">
    <div class="seperator-div"></div>
    <h2 class="inv-hdr">Inventory</h2>
</div>

<div class="inv-body" style="padding-left: 200px;">
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Amount</th>
            <th>New Amount</th>
            <th>Submit</th>
            <th>Delete Product</th>
        </tr>

        <?php
        $query = "SELECT * FROM tbl_snacks ORDER BY id ASC";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <form action="inventory.php" method="POST">
                    <tr>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["amount"]; ?></td>
                        <td><input type="number" placeholder="00" name="newamnt"></td>
                        <td><input type="submit" name="chng_amnt" class="btn btn-warning" value="Change amount"></td>
                        <td><input type="submit" name="delete_snack" class="btn btn-danger" value="Delete Product"></td>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                    </tr>
                </form>
        <?php
            }
        }
        ?>

        <?php
        $query = "SELECT * FROM tbl_alcohol ORDER BY id ASC";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <form action="inventory.php" method="POST">
                    <tr>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["Amount"]; ?></td>
                        <td><input type="number" placeholder="00" name="newamnt"></td>
                        <td><input type="submit" name="chng_amnt2" class="btn btn-warning" value="Change amount"></td>
                        <td><input type="submit" name="delete_alc" class="btn btn-danger" value="Delete Product"></td>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    </tr>
                </form>
        <?php
            }
        }
        ?>
    </table>
    <div class="container" style="margin-bottom: 30px;">
        <div class="row">

            <div class="col-6">
                <div class="contact-form-info">
                    <form action="inventory.php" method="POST" enctype="multipart/form-data">
                        <div class="contact-form-info2">
                            <h3 style="padding-top: 20px">Create new Snack</h3>
                            <p class="contact-form-text">Name</p>
                            <input type="text" name="name" class="contact-form-input">
                            <p class="contact-form-text">Price</p>
                            <input type="text" name="price" class="contact-form-input">
                            <p class="contact-form-text">Amount</p>
                            <input type="text" name="amount" class="contact-form-input">
                            <p class="contact-form-text">Image Upload</p>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <br>
                            <input type="submit" name="new_snack" class="contact-form-button btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-6">
                <div class="contact-form-info">
                    <form action="inventory.php" method="POST" enctype="multipart/form-data">
                        <div class="contact-form-info2">
                            <h3 style="padding-top: 20px">Create new Alcohol</h3>
                            <p class="contact-form-text">Name</p>
                            <input type="text" name="name" class="contact-form-input">
                            <p class="contact-form-text">Price</p>
                            <input type="text" name="price" class="contact-form-input">
                            <p class="contact-form-text">Amount</p>
                            <input type="text" name="amount" class="contact-form-input">
                            <p class="contact-form-text">Image Upload</p>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <br>
                            <input type="submit" name="new_alc" class="contact-form-button btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "templates/footer.php"; ?>