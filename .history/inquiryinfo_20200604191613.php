<?php
include "templates/header.php";
$connect = mysqli_connect("localhost", "root", "", "cart_system");
?>

<div class="inq-info-header">
    <div class="seperator-div"></div>
    <h2 class="inq-info-hdr">Inquiry Info</h2>
</div>

<div class="inq-info-body">
    <h2>Subject</h2>
    <p>Subject of the Inquiry goes here</p>
    <div class="seperator-div"></div>
    <h2>Message</h2>
    <p><i>The massage the person left will be here</i></p>
</div>

<?php include "templates/footer.php"; ?>