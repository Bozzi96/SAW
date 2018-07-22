<?php
session_start();
//Instaurazione della connessione
require "../db/mysql_credentials.php";
$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

//Salvataggio dei parametri
$compratore = $_SESSION['utente']['email'];
$venditore = $_SESSION['target_user'];


//Query di inserimento nella tabella feedback (ignorata se esiste già una entry)
$query = "INSERT IGNORE into feedback values ('$compratore', '$venditore', 0, 0)" ; // or '$compratore' ??
$result = $con->query($query);


//Query di aggiornamento dell'annuncio venduto
?>