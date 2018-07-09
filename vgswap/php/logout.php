<?php
    session_start();
    $_SESSION = array(); // desetto tutte le variabili di sessione
    session_destroy();
    header("location:../pages/index.php");
?>