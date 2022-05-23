<?php

//starting the session 
session_start();
//connection of host
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cart_system";
$conn = mysqli_connect($servername, $username, $password, $dbname);


//variables
$username = $_POST['Username'];
$password = $_POST['Password'];
$Occupation = $_POST['Occupation'];
$lockout = false;
$lockoutcount = 0;
$rowData;

$query = "Select * from login WHERE  Username='$username'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		$lockoutcount = $row["lockout"];
		if ($row["lockout"] >= 3) {
			$lockout = true;
		}
	}
}
$lockoutcount = $lockoutcount + 1;

if ($lockout == false) {
	if (isset($_POST['Username'])) {
		// This query checks if the userID and password entered is in the database
		$result = mysqli_query($conn, "Select * from login WHERE  Username='$username' and Password='$password' and Occupation='$Occupation'");
	}
	//if the result query is  equal to one the it will direct the user to their corresponding page
	if (mysqli_num_rows($result) == 1) {
		$sql = "UPDATE login SET lockout = 0 WHERE Username= '$username'";
		$conn->query($sql);
		$rowData = $result->fetch_assoc();
		$_SESSION['Occupation'] = $Occupation;
		if ($Occupation == 'Owner') {

			echo "<script> location.href='index.php'</script>";
		} else if ($Occupation == 'Employee') {
			echo "<script> location.href='index.php'</script>";

			echo "<script> location.href='index.html'</script>";
		} else {

			echo "<script> location.href='index.php'</script>";
		}
	} else {
		//if result query equals zero then it will display an error message and direct them back to the login page

		$sql = "UPDATE login SET lockout = $lockoutcount WHERE Username= '$username'";
		if ($conn->query($sql) === TRUE) {
			echo "<script> alert('Username, Password or Occupation incorrect') </script>";
			echo "<script> location.href='login.html'</script>";
		}
	}
} else {
	echo "<script> alert('You are locked out and must set a new password to continue.') </script>";
	echo "<script> location.href='login.html'</script>";
}
