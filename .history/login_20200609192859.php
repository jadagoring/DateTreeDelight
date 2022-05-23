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
$rowData;

$query = "Select * from login WHERE  Username='$username'";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		if ($row["lockout"] >= 3) {
			$lockout = true;
		}
	}
}

if ($lockout == false) {
	if (isset($_POST['Username'])) {
		// This query checks if the userID and password entered is in the database
		$result = mysqli_query($conn, "Select * from login WHERE  Username='$username' and Password='$password' and Occupation='$Occupation'");
	}
	//if the result query is  equal to one the it will direct the user to their corresponding page
	if (mysqli_num_rows($result) == 1) {
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
		$sql = "UPDATE login SET lockout = lockout+1 WHERE Username='$username'";
		echo "<script> alert('username or Password incorrect') </script>";
		echo "<script> location.href='login.html'</script>";
	}
} else {
	echo "<script> alert('You are locked out and must set a new password to continue.') </script>";
}
