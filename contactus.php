<?php
include "templates/header.php";
$connect = mysqli_connect("localhost", "root", "", "cart_system");

if (isset($_POST["submitinq"]))
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

	$insert=mysqli_query($connect, "INSERT INTO inquirylog(name,email,subject,info,completed) VALUES('$name','$email','$subject','$message','0')");
	
	if (!$insert)
	{
		die("Error: ".mysqli_error($connect));
	}
	else
	{
		echo "<script> alert('You Have successfully created an inquiry.') </script>";
		echo "<script> location.href='contactus.php' </script>";
		
	}
}
?>

<div class="contactus-header">
    <div class="seperator-div"></div>
    <h1 class="contactus-hdr">Contact Us</h1>
</div>

<div class="contactus-body">
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d970.731163968368!2d-59.582570999999994!3d13.292647000000047!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdbafc17f6561b8ef!2sDate%20tree%20hill%20bar!5e0!3m2!1sen!2sus!4v1591291810439!5m2!1sen!2sus" width="600" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <div class="contact-left">
        <div class="contact-address">
            <h2>Address: <br> Date Tree Hill <br> St. Peter, Barbados</h2> 
        </div>


        <div class="contact-form">
            <div class="contact-left">
                <div class="contact-form-info">
                    <form action="contactus.php" method="POST">
                        <div class="contact-form-info2">
                            <h3 style="padding-top: 20px">Get In Touch</h3>
                            <p class="contact-form-text">Your Name</p>
                            <input type="text" name="name" class="contact-form-input">
                            <p class="contact-form-text">Your Email</p>
                            <input type="text" name="email" class="contact-form-input">
                            <p class="contact-form-text">Subject</p>
                            <input type="text" name="subject" class="contact-form-input">
                            <p class="contact-form-text">Your Message</p>
                            <textarea class="contact-form-textbox" name="message"></textarea>
                            <br>
                            <input type="submit" name="submitinq" class="contact-form-button btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "templates/footer.php"; ?>