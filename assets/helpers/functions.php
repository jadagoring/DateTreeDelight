<?php
class App
{
    function getRole()
    {
        if (isset($_SESSION['Occupation'])) {
            $Occupation = $_SESSION['Occupation'];
        } else {
            $Occupation = "Random";
        }

        return $Occupation;
    }
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
            }
            else{
                header('Location:index.php');
            }
        } else {
            header('Location:index.php');
        }
    }

    function customerpage()
    {
        if (isset($_SESSION['Occupation'])) {
            if (($_SESSION['Occupation'] == "Owner") || ($_SESSION['Occupation'] == "Employee") || ($_SESSION['Occupation'] == "Customer")) {
            }
            else{
                header('Location:index.php');
            }
        } else {
            header('Location:index.php');
        }
    }
}
