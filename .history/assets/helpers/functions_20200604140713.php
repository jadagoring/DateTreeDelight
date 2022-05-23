<?php
class App{
    function is_admin(){
        if (isset($_SESSION['Occupation'])) {
            if($_SESSION['Occupation'] == "Owner")
            {

            }
        } else {
            $Occupation = "Random";
        }
    }
}
