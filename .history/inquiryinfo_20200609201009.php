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

</div>

<?php include "templates/footer.php"; ?>