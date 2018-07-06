<?php

    /*
    Questo script interroga il database e ottiene le informazioni relative all'annuncio,
    dopodiché le converte in formato JSON e le ritorna al codice JS che le ha richieste.
    */

    # La sessione contiene i dati per visualizzare l'annuncio corretto
    session_start();

    # Connessione al db
    require '../db/connection.php';

    # Recupero dei dati da visualizzare
    if (isset($_SESSION['new_ad'])) {
        # L'annuncio da visualizzare è quello appena inserito dall'utente
        
        $email = $_SESSION['new_ad']['email'];    # i dati sono già sanitizzati
        $v_name = $_SESSION['new_ad']['v_name'];
        $console = $_SESSION['new_ad']['console'];

        # Invalida dell'array di sessione
        unset($_SESSION['new_ad']);
    }
    elseif (isset($_POST['new_ad'])) {
        #... L'annuncio da visualizzare è stato richiesto da qualche altra parte
    }
    else {
        echo "ERRORE: Nessun annuncio da visualizzare";
        $conn -> close();
        die();
    }

    # Interrogazione del database
    $stmt = $conn -> prepare("SELECT * FROM annunci WHERE email = ? AND nome_videogioco = ?");
    $stmt -> bind_param("ss", $email, $v_name);
        
    $stmt -> execute();
   
    # Il risultato della query viene salvato in un oggetto
    $result = $stmt -> get_result();
    $result_obj = $result -> fetch_object();
    
    # Restituzione dei dati JSON alla funzione JS
    $result_json = json_encode($result_obj);
    echo $result_json;            

    
    # Chiusura delle connessioni
    $stmt -> close();
    $conn -> close();

?>