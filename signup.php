<?php


	//connection of host
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cart_system";
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	

	
	//Variables 
	$firstName=$_POST['FirstName'];
	$lastName=$_POST['LastName'];
	$email=$_POST['Email'];
	$username=$_POST['Username'];
	$password=$_POST['Password'];
	$VPassword=$_POST['VPassword'];
	$Occupation="Customer";
	
	$insert=mysqli_query($conn, "INSERT INTO login(userName,firstName,lastName,email,Password,Occupation) VALUES('$username','$firstName','$lastName','$email','$password','$Occupation')");
	
	if (!$insert)
	{
		die("Error: ".mysqli_error($conn));
	}
	else
	{
		echo "<script> alert('You Have created an Account') </script>";
		echo "<script> location.href='login.html' </script>";
		
	}
	
	mysqli_close($conn);

?>