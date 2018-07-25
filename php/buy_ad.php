<?php
session_start();

//Instaurazione della connessione
require "../db/mysql_credentials.php";
$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

//Salvataggio dei parametri
$current_ad = json_decode(file_get_contents("php://input"));
$compratore = $_SESSION['utente']['email'];
$venditore = $current_ad->owner_email;
$console = $current_ad->console;
$v_name = $current_ad->v_name;

$con->autocommit(false);
//Query di inserimento nella tabella feedback (ignorata se esiste già una entry)
$query = "INSERT IGNORE INTO feedback VALUES ('$compratore', '$venditore', 0, 0)" ; 
$con->query($query);


//Query di aggiornamento dell'annuncio venduto
$query = "UPDATE annunci 
          SET compratore = '$compratore', stato = 'Venduto'
          WHERE email = '$venditore' AND console = '$console' AND nome_videogioco = '$v_name' ";
$con->query($query);
$con->commit();
$sold=1; //flag
echo json_encode($sold);

$con->close();
?>