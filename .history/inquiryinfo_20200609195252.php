<?php
include "templates/header.php";
$app -> employeepage();
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


if (!$insert) {
    die("Error: " . mysqli_error($connect));
} else {
    echo "<script> alert('You Have successfully replied to an inquiry.') </script>";
    echo "<script> location.href='inquiries.php' </script>";
}

?>

<div class="inq-info-header">
    <div class="seperator-div"></div>
    <h2 class="inq-info-hdr">Inquiry Info</h2>
</div>

<div class="inq-info-body">

    <h2>Subject</h2>
    <p><?php echo $subject; ?></p>

    <h2>Message</h2>
    <p><i><?php echo $info ?></i></p>

    <h2>Reply</h2>
    <form action="mailto:<?php echo $row['email']; ?>" method="POST" enctype="text/plain">
        <textarea name="" placeholder="Type reply here" style="width: 500px; height: 200px;"></textarea> <br>
        <input type="submit" class="btn btn-success contact-form-button">
    </form>
</div>

<?php include "templates/footer.php"; ?>