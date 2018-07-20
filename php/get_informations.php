<?php
    session_start();
    $myObj;
    
        if(isset($_SESSION["utente"])){
            $citta = $_SESSION['utente']['citta'];
            $cap = $_SESSION['utente']['cap'];

            $myObj -> city_name = "$citta ";
            $myObj -> cap_value = "$cap";

            $myJSON = json_encode($myObj);
            echo  $myJSON;

        }
    

?>