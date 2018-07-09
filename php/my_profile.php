<?php
session_start();
//serve per fare l'unset della variabile target_user, e poi fare il redirect verso la pagina del proprio profilo
if(isset($_SESSION['target_user']))
    unset($_SESSION['target_user']);
header("location: ../pages/profile.php");

?>