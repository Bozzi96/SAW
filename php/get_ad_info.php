<?php

    /*
    Questo script interroga il database e ottiene le
    informazioni relative all'annuncio che si vuole visualizzare.
    */

    # La sessione contiene i dati per visualizzare l'annuncio corretto
    session_start();

    # Connessione al db
    require '../db/connection.php';

    # L'annuncio da visualizzare è stato cliccato nella lista.
    # La funzione "file_get_contents()" ottiene le informazioni
    # inviate dal client per recuperare l'annuncio dal database.
    $ad_info = json_decode(file_get_contents("php://input"));
    
    $email = $ad_info -> owner_email;
    $v_name = $ad_info -> v_name;
    $console = $ad_info -> console;

    # Interrogazione del database: ritorna una entry contenente l'annuncio e il suo proprietario.
    $stmt = $conn -> prepare("
            SELECT u.email, u.nome, u.cognome,
                    u.feed_positivi, u.feed_negativi,
                    u.citta, u.provincia, u.cap,
                    a.nome_videogioco, a.console, a.prezzo, a.durata
                FROM utenti AS u JOIN annunci AS a ON u.email = a.email
                WHERE u.email = ? AND a.nome_videogioco = ? AND a.console = ?");
    $stmt -> bind_param("sss", $email, $v_name, $console);
        
    $stmt -> execute();
   
    # Il risultato della query viene salvato in un oggetto
    $result = $stmt -> get_result();
    $result_obj = $result -> fetch_object();

    # Salvataggio nella sessione del proprietario dell'annuncio
    $_SESSION['target_user'] = $email;
    
    # Restituzione dei dati JSON alla funzione JS
    $result_json = json_encode($result_obj);
    echo $result_json;            

    
    # Chiusura delle connessioni
    $stmt -> close();
    $conn -> close();

?>