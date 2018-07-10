<?php

session_start();
include("../db/mysql_credentials.php");
include("sanitize_input.php");
$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

$name = $_POST['name'];
$surname = $_POST['surname'];
$city = $_POST['city'];
$province = $_POST['province'];
$cap = $_POST['cap'];

//sanitizzazione dati
$name = sanitize_input($con, $name);
$surname = sanitize_input($con, $surname);
$city = sanitize_input($con, $city);
$province = sanitize_input($con, $province);



$query = "UPDATE utenti SET nome=?, cognome=?, citta=?, provincia=?, cap=? WHERE email=?";
$email= $_SESSION['utente']['email'];
$stmt = $con->prepare($query);
$stmt->bind_param("ssssis", $name, $surname, $city, $province, $cap, $email);
$stmt->execute();
$prova = $stmt->get_result();
$num=mysqli_affected_rows($con);
$stmt->close();

$con->close();
//redirect verso la pagina precedente
$_SESSION['num']= $num;     //salvataggio variabile per tenere traccia delle modifiche

//Cambiamento nome e cognome per visualizzarli correttamente nella pagina principale in caso di modifica
$_SESSION['utente']['nome'] = $name;
$_SESSION['utente']['cognome'] = $surname;
header("location: ../pages/profile.php");
exit();  //same as die();


?>