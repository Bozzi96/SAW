<?php

session_start();
include("../db/mysql_credentials.php");
$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

$name = $_POST['name'];
$surname = $_POST['surname'];
$city = $_POST['city'];
$province = $_POST['province'];
$cap = $_POST['cap'];


$query = "UPDATE utenti SET nome=?, cognome=?, citta=?, provincia=?, cap=? WHERE email=?";
$email="alessandro.bozzi@gmail.com";
$stmt = $con->prepare($query);
$stmt->bind_param("ssssis", $name, $surname, $city, $province, $cap, $email);
$stmt->execute();
$num=mysqli_affected_rows($con);
$stmt->close();

$con->close();
//redirect verso la pagina precedente
$_SESSION['num']= $num;     //salvataggio variabile per tenere traccia delle modifiche
header("location: /vgswap/pages/profile.php");
exit();  //same as die();


?>