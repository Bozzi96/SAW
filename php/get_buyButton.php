<?php
session_start();

//Salvataggio parametri
$current_ad = json_decode(file_get_contents("php://input"));
$venditore = $current_ad->owner_email;
$console = $current_ad->console;
$v_name = $current_ad->v_name;

//Instaurazione della connessione
require "../db/mysql_credentials.php";
$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);
$query = "SELECT stato, compratore
          FROM annunci
          WHERE email = '$venditore' AND console = '$console' AND nome_videogioco = '$v_name' ";
$result = $con->query($query);
$row = $result->fetch_object();

//variabile che tiene traccia dello stato dell'annuncio e dell'utente
$response = array();

//Si guarda se l'annuncio è disponibile
if (strcmp($row->stato, "Disponibile") == 0 ) {
    //Annuncio disponibile
    $response[] = 1;
}
else {
    //Annuncio non disponibile
    $response[] = 0;
}

//Si guarda chi è l'utente che sta visualizzando l'annuncio
if (strcmp($_SESSION['utente']['email'] , $venditore)==0) {
    $response[] = 1;    //Venditore (l'utente è il proprietario)
}   
    else if ($row->compratore!=null) {
        
        if (strcmp($_SESSION['utente']['email'] , $row->compratore)==0) {
            $response[] = -1;    //Compratore
        }
    }
    else {
        $response[] = 0;
    }
//Recupero delle informazioni sul compratore
if($row->compratore!=null) {
    $response[] = $row->compratore;
    $query = "SELECT nome, cognome
          FROM utenti
          WHERE email = '$row->compratore'";
$result = $con->query($query);
$row = $result->fetch_object();

//Salvataggio informazioni
$response[] = $row->cognome;
$response[] = $row->nome;
        

}

echo json_encode($response);
$con->close();
?>