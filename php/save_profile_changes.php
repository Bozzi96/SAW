<?php
session_start();

//Instaurazione connessione
include("../db/mysql_credentials.php");
$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

//Salvataggio parametri
$name = $_POST['name'];
$surname = $_POST['surname'];
$city = $_POST['city'];
$province = $_POST['province'];
$cap = $_POST['cap'];

//Update nel database dei campi modificati
$query = "UPDATE utenti SET nome=?, cognome=?, citta=?, provincia=?, cap=? WHERE email=?";
$email= $_SESSION['utente']['email'];
$stmt = $con->prepare($query);
$stmt->bind_param("ssssis", $name, $surname, $city, $province, $cap, $email);
$stmt->execute();
$num = mysqli_affected_rows($con);
$stmt->close();

$con->close();

//Salvataggio variabile per tenere traccia delle modifiche
$_SESSION['num']= $num;
//Cambio nome e cognome per visualizzarlo nella pagina principale, in caso di modifica
$_SESSION['utente']['nome'] = $name;
$_SESSION['utente']['cognome'] = $surname;
//Redirect verso la pagina precedente
header("location: ../pages/profile.php");
exit();  //same as die();


?>