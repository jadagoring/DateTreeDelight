<?php
include "templates/header.php";
$connect = mysqli_connect("localhost", "root", "", "cart_system");
?>

<div class="inq-header">
    <div class="seperator-div"></div>
    <h2 class="inq-hdr">Inquiries</h2>
</div>

<div class="inq-body">
    <table>
        <h2 style="padding-top: 20px;">Manage Inquiries</h2>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Submit</th>
            <th>See More</th>
        </tr>

        <?php
        $query = "SELECT * FROM login ORDER BY userID ASC";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <form action="inquiryinfo.php" method="POST">
                    <tr>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["userName"]; ?></td>
                        <td><?php echo $row["firstName"]; ?></td>
                        <td><?php echo $row["lastName"]; ?></td>
                        <td style="text-align: center;"><input type="submit" value="Delete" name="deleteusr" class="btn btn-danger"></td>
                        <input type="hidden" name="userID" value="<?php echo $row['userID'] ?>">

                    </tr>
                </form>
        <?php
            }
        }
        ?>

        <table>
            <form action="employees.php" method="POST">
                <h3>Add Employees</h3>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="Email" style="width: 700px;"></td>
                </tr>

                <tr>
                    <th>Username</th>
                    <td><input type="text" name="Username" style="width: 700px;"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="Password" style="width: 700px;"></td>
                </tr>
                <tr>
                    <th>Firstname</th>
                    <td><input type="text" name="FirstName" style="width: 700px;"></td>
                </tr>
                <tr>
                    <th>Surname</th>
                    <td><input type="text" name="LastName" style="width: 700px;"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="Submit" name="Submit" value="Submit" class="btn btn-success"></td>
                </tr>
            </form>
        </table>
</div>

<?php include "templates/footer.php"; ?>