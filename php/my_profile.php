<?php
session_start();

//Unset della variabile target_user e redirect verso la pagina del proprio profilo
if(isset($_SESSION['target_user']))
    unset($_SESSION['target_user']);

header("location: ../pages/profile.php");
?>