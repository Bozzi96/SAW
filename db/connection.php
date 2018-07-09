<?php

    require 'mysql_credentials.php';

    // Begin connection
    $conn = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

    // Check connection
    if ($conn -> connect_error) {
        die("Connessione al database fallita: " . $conn -> connect_error);
    }
    
?>
