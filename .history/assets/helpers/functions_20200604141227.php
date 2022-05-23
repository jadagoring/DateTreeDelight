<?php
class App
{
    function adminpage()
    {
        if (isset($_SESSION['Occupation'])) {
            if ($_SESSION['Occupation'] != "Owner") {
                header('Location:index.php');
            }
        } else {
            header('Location:index.php');
        }
    }

    function employeepage()
    {
        if (isset($_SESSION['Occupation'])) {
            if (($_SESSION['Occupation'] == "Owner") || ($_SESSION['Occupation'] == "Employee")) {
                header('Location:index.php');
            }
        } else {
            header('Location:index.php');
        }
    }
}
