<?php
session_start();
include "assets/helpers/functions.php";

$app = new App();

$Occupation = $app->getRole();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Tree Delight</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\css\styles.css">

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e9662c41f5.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- No log in -->
    <?php if ($Occupation == "Random") { ?>

        <div id="Navbar" class="nav-bar">
            <div class="right-nav">
                <a href="index.php" class="side-links">Home </a>
                <a href="Menu.php" class="side-links">Menu</a>
                <a href="Aboutus.php" class="side-links">About us</a>
                <a href="Contactus.php" class="side-links">Contact Us</a>
                <a href="login.html" class="side-links" style="margin-right:20px">Sign In</a>
            </div>

            <div class="left-nav">
                <div class="left-info">
                    <img src="assets\images\l-07-512.png" style="width: 60px; height: 60px; border-radius: 30px;" alt="Logo">
                    <span class="nav-text">Date Tree Delight</span>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <!-- Customers login -->
    <?php if ($Occupation == "Customer") { ?>

        <div id="Navbar" class="nav-bar">
            <div class="right-nav">
                <a href="shoppingcart.php"><img src="assets/images/shopping-cart.png" alt="shoppingcart" class="shop-cart"></a>
                <a href="index.php" class="side-links">Home </a>
                <a href="Menu.php" class="side-links">Menu</a>
                <a href="Aboutus.php" class="side-links">About us</a>
                <a href="Contactus.php" class="side-links">Contact Us</a>
                <a href="signout.php" class="side-links" style="margin-right:20px">Sign Out</a>
            </div>

            <div class="left-nav">
                <div class="left-info">
                    <img src="assets\images\l-07-512.png" style="width: 60px; height: 60px; border-radius: 30px;" alt="Logo">
                    <span class="nav-text">Date Tree Delight</span>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <!-- Employees Logged in -->
    <?php if ($Occupation == "Employee") { ?>

        <div id="Navbar" class="nav-bar">
            <div class="right-nav">
                <a href="order.php" class="side-links">Orders </a>
                <a href="inventory.php" class="side-links">Inventory</a>
                <a href="inquiries.php" class="side-links">Inquiries</a>
                <a href="signout.php" class="side-links" style="margin-right:20px">Sign Out</a>
            </div>

            <div class="left-nav">
                <div class="left-info">
                    <img src="assets\images\l-07-512.png" style="width: 60px; height: 60px; border-radius: 30px;" alt="Logo">
                    <span class="nav-text">Date Tree Delight</span>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Admin logged in -->
    <?php if ($Occupation == "Owner") { ?>
        <div id="Navbar" class="nav-bar">
            <div class="right-nav">
                <a href="events.php" class="side-links">Events</a>
                <a href="order.php" class="side-links">Orders</a>
                <a href="inventory.php" class="side-links">Inventory</a>
                <a href="inquiries.php" class="side-links">Inquires</a>
                <a href="Employees.php" class="side-links">Employees</a>
                <a href="signout.php" class="side-links" style="margin-right:20px">Sign Out</a>
            </div>

            <div class="left-nav">
                <div class="left-info">
                    <img src="assets\images\l-07-512.png" style="width: 60px; height: 60px; border-radius: 30px;" alt="Logo">
                    <span class="nav-text">Date Tree Delight</span>
                </div>
            </div>
        </div>
    <?php } ?>