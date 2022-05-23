    <div class="footer">
        <div class="container">
            <!-- No log in -->
            <?php if ($Occupation == "Random") { ?>

                <div class="row footer-nav">
                    <div class="col-2"> <a href="index.html" class="side-links">Home </a> </div>
                    <div class="col-2"> <a href="Menu.html" class="side-links">Menu</a> </div>
                    <div class="col-2"> <a href="Orders.html" class="side-links">Order</a> </div>
                    <div class="col-2"> <a href="Aboutus.html" class="side-links">About us</a> </div>
                    <div class="col-2"> <a href="Contactus.html" class="side-links">Contact Us</a> </div>
                    <div class="col-2"> <a href="Vorder.html" class="side-links">View Orders</a> </div>
                </div>
            <?php
            }
            ?>

            <!-- Customers login -->
            <?php if ($Occupation == "Customer") { ?>

                <div class="row footer-nav">
                    <div class="col-2"> <a href="index.html" class="side-links">Home </a> </div>
                    <div class="col-2"> <a href="Menu.html" class="side-links">Menu</a> </div>
                    <div class="col-2"> <a href="Orders.html" class="side-links">Order</a> </div>
                    <div class="col-2"> <a href="Aboutus.html" class="side-links">About us</a> </div>
                    <div class="col-2"> <a href="Contactus.html" class="side-links">Contact Us</a> </div>
                    <div class="col-2"> <a href="Vorder.html" class="side-links">View Orders</a> </div>
                </div>
            <?php
            }
            ?>

            <!-- Employees Logged in -->
            <?php if ($Occupation == "Employee") { ?>

                <div class="row footer-nav">
                    <div class="col-2"> <a href="index.html" class="side-links">Home </a> </div>
                    <div class="col-2"> <a href="Menu.html" class="side-links">Menu</a> </div>
                    <div class="col-2"> <a href="Orders.html" class="side-links">Order</a> </div>
                    <div class="col-2"> <a href="Aboutus.html" class="side-links">About us</a> </div>
                    <div class="col-2"> <a href="Contactus.html" class="side-links">Contact Us</a> </div>
                    <div class="col-2"> <a href="Vorder.html" class="side-links">View Orders</a> </div>
                </div>
            <?php } ?>

            <!-- Admin logged in -->
            <?php if ($Occupation == "Owner") { ?>

                <div class="row footer-nav">
                    <div class="col-2"> <a href="index.html" class="side-links">Home </a> </div>
                    <div class="col-2"> <a href="Menu.html" class="side-links">Menu</a> </div>
                    <div class="col-2"> <a href="Orders.html" class="side-links">Order</a> </div>
                    <div class="col-2"> <a href="Aboutus.html" class="side-links">About us</a> </div>
                    <div class="col-2"> <a href="Contactus.html" class="side-links">Contact Us</a> </div>
                    <div class="col-2"> <a href="Vorder.html" class="side-links">View Orders</a> </div>
                </div>
            <?php } ?>

            <div class="spacer-div"></div>
            <div class="row footer-nav-text">
                <div style="text-align:center; margin-left: auto; margin-right: auto;">
                    <hr class="footer-hr" style="width:300px;">
                    <p class="footer-text"> Address: </p>
                    <p>Date Tree Hill, St. Peter</p>
                    <hr class="footer-hr" style="width:200px;">
                    <p class="footer-text">Telephone No.:</p>
                    <p>1 (246) 555-5050</p>
                    <hr class="footer-hr" style="width:100px;">
                </div>
            </div>

            <div class="row">
                <div class="socials" style="text-align:center; margin-left: auto; margin-right: auto;">
                    <p> <a href="https://instagram.com/datetreedelight?igshid=wuq8k1wrkhhx"><i class="fab fa-instagram"></i> </a>
                        <a href="https://facebook.com/datetreedelight246"><i class="fab fa-facebook-square"> </i></a>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="footer-comp" style="text-align:center; margin-left: auto; margin-right: auto;">
                    <p> Created By: <span class="footer-company"> Code Like a Girl &copy </span> </p>
                </div>
            </div>

        </div>
    </div>
    </body>

    </html>