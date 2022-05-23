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
}
