<?php
session_start();

//Salvataggio parametri
$current_ad = json_decode(file_get_contents("php://input"));
$venditore = $current_ad->owner_email;
$console = $current_ad->console;
$v_name = $current_ad->v_name;

if (strcmp($_SESSION['utente']['email'] , $venditore)==0) {
    //Il proprietario sta visualizzando il proprio annuncio
    $response = -1;
    echo json_encode($response);
}
else {
    //Instaurazione della connessione
    require "../db/mysql_credentials.php";
    $con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);
    $query = "SELECT stato
              FROM annunci
              WHERE email = '$venditore' AND console = '$console' AND nome_videogioco = '$v_name' ";
    $result = $con->query($query);
    $row = $result->fetch_object();
    if ( strcmp($row->stato, "Disponibile") == 0 ) {
        //Annuncio disponibile
        $response = 1;
        echo json_encode($response);
    }
    else {
        //Annuncio non disponibile
        $response = -2;
        echo json_encode($response);
        
    }
    
    $con->close();
}

?>