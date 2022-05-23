<?php
include "templates/header.php";
$app -> adminpage();
$connect = mysqli_connect("localhost", "root", "", "cart_system");

if (isset($_POST["deleteusr"]))
{
    $usrid = $_POST["userID"];

    $sql = "DELETE FROM login WHERE userID = $usrid";
    if ($connect->query($sql) === TRUE) {

        echo '<script> alert("User Deleted")</script>';
        echo '<script>window.location="employees.php"</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}else if(isset($_POST["Submit"]))
{
    //Variables 
	$firstName=$_POST['FirstName'];
	$lastName=$_POST['LastName'];
	$email=$_POST['Email'];
	$username=$_POST['Username'];
	$password=$_POST['Password'];
	$Occupation="Employee";
	
	$insert=mysqli_query($connect, "INSERT INTO login(userName,firstName,lastName,email,Password,Occupation) VALUES('$username','$firstName','$lastName','$email','$password','$Occupation')");
	
	if (!$insert)
	{
		die("Error: ".mysqli_error($connect));
	}
	else
	{
		echo "<script> alert('You Have created an Account') </script>";
		echo "<script> location.href='employees.php' </script>";
		
	}
}
?>

<div class="emp-header">
    <div class="seperator-div"></div>
    <h2 class="emp-hdr"> Employees</h2>
</div>

<div class="emp-body"> 
<table>
<h2 style="padding-top: 20px;">Manage Employees</h2>
        <tr>
            <th>Email</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Submit</th>
        </tr>

        <?php
        $query = "SELECT * FROM login ORDER BY userID ASC";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <form action="employees.php" method="POST">
                    <tr>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["userName"]; ?></td>
                        <td><?php echo $row["firstName"]; ?></td>
                        <td><?php echo $row["lastName"]; ?></td>
                        <td  style="text-align: center;"><input type="submit" value="Delete" name="deleteusr" class="btn btn-danger"></td>
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