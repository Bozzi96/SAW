<?php
session_start();
//Sanitizzazione dei dati inseriti dall'utente
function sanitize_input($conn, $str) {
    $str = trim($str);
    $str = $conn -> real_escape_string($str);
    $str = filter_var($str, FILTER_SANITIZE_STRING);
    return $str;
}
?>