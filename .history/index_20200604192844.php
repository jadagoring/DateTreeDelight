<?php
include "templates/header.php";
?>
<div class="headerss">
    <div class="seperator-div"></div>
    <div class="headers">
        <h1 class="index-header">Welcome</h1>
        <p>Date Tree Delight, where the smiles are always bright</p>
        <a href="login.html"><button class="welcome-btn">Login/Signup Here</button></a>
    </div>
</div>

<div class="items">

    <h2 class="product-title">Products & Services</h2>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="product-row">
                    <div class="img-row"><img class="Test-tt" width="100%" height="100%" src="assets\images\item2.jpg" alt="alcohol"></div>
                    <h3 class="Test-t">Alcoholic Drinks</h3>
                </div>
            </div>
            <div class="col-3">
                <div class="product-row">
                    <h3 class="Test-t">Non-Alcohlic Drinks</h3>
                    <div class="img-row"><img class="Test-tt" src="assets\images\item3.jpg" alt="juice"></div>
                </div>
            </div>
            <div class="col-3">
                <div class="product-row">
                    <div class="img-row"><img class="Test-tt" src="assets\images\item4.jpg" alt="can"></div>
                    <h3 class="Test-t">Canned Foods</h3>
                </div>
            </div>
            <div class="col-3">
                <div class="product-row">
                    <div class="img-row"><img class="Test-tt" src="assets\images\item1.jpg" alt="Snacks"></div>
                    <h3 class="Test-t">Snacks</h3>
                </div>
            </div>
        </div>
    </div>
    <a href="menu.php"><button class="menu-btn">Click to see Menu</button></a>
</div>

<?php include "templates/footer.php"; ?>