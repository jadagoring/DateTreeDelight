<?php
include "templates/header.php";
?>

<div class="contactus-header">
    <div class="seperator-div"></div>
    <h1 class="contactus-hdr">Contact Us</h1>
</div>

<div class="contactus-body">
    <div class="contact-map">
        <div class="mapouter">
            <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=date%20tree%20&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.whatismyip-address.com">what is my ip</a></div>
            <style>
                .mapouter {
                    position: relative;
                    text-align: right;
                    height: 500px;
                    width: 600px;
                }

                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    height: 500px;
                    width: 600px;
                }
            </style>
        </div>
    </div>
    <p>Date Tree Hill, <br>
        St. Peter</p>
</div>

<?php include "templates/footer.php"; ?>