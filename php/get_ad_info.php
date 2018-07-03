<?php

    /*
    Questo script interroga il database e ottiene le informazioni relative all'annuncio,
    dopodiché le converte in formato JSON e le ritorna al codice JS che le ha richieste.
    */

    # La sessione contiene i dati per visualizzare l'annuncio corretto
    session_start();

    # Connessione al db
    require '../db/connection.php';

    # Recupero dei dati dalla sessione
    if (!isset($_SESSION['email']) || !isset($_SESSION['v_name'])) {
        echo "Sessione assente.<br>";
    }

    $email = $_SESSION['email'];    # i dati sono già sanitizzati
    $v_name = $_SESSION['v_name'];

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