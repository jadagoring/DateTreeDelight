<?php
class App{
    function adminpage(){
        if (isset($_SESSION['Occupation'])) {
            if($_SESSION['Occupation'] == "Owner")
            {

            }
        } else {
            $Occupation = "Random";
        }
    }
}
