<?php

    /*
    Questo script ottiene dal database tutti gli annunci comprati dall'utente,
    loggato e li passa allo script JS che li visualizza nell'elenco.
    */

    # E' necessario essere autenticati per ottenere tutti gli annunci
    session_start();
    # Controllo sul login
    if (!isset($_SESSION['utente'])) {
        die("Nessun utente loggato.");
    }

    # Connessione al db
    require '../db/connection.php';

    # Preparazione della query: se "compratore" non è NULL significa che
    # l'annuncio è stato venduto
    $stmt = $conn -> prepare("
        SELECT email, nome_videogioco, console, prezzo, durata
        FROM annunci
        WHERE compratore = ?
    ");
    $stmt -> bind_param("s", $_SESSION['utente']['email']);

    # Interrogazione del database
    $stmt -> execute();
    $result = $stmt -> get_result();
    
    # Dato che il risultato della query prevede più righe, il salvataggio avviene
    # in un array di oggetti, ognuno contenente una riga.
    $rows = array();
    while ($current_obj = $result -> fetch_object()) {
        $rows[] = $current_obj;
    }

    # Codifica del risultato in formato JSON
    $result_json = json_encode($rows);
    echo $result_json;

    # Rilascio del result set e dello statement
    $result -> close();
    $stmt -> close();

    # Chiusura della connessione
    $conn -> close();

?>