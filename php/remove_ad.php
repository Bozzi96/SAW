<?php

    /*
    Questo script rimuove dal database l'annuncio che riceve come input in JSON,
    cancellando allo stesso tempo tutti i messaggi relativi ad esso.
    */

    # E' necessario essere autenticati per rimuovere un annuncio
    session_start();
    # Controllo sul login
    if (!isset($_SESSION['utente'])) {
        die("Nessun utente loggato.");
    }

    # Connessione al db
    require '../db/connection.php';

    # Acquisizione dei dati dell'annuncio da rimuovere
    $removing_ad = json_decode(file_get_contents("php://input"));

    # E' necessario eseguire due query quindi no autocommit
//    $conn -> autocommit(false);

    # Rimozione di tutti i messaggi relativi all'annuncio
    # Preparazione delle query
    $remove_messages = $conn -> prepare("
        DELETE FROM messaggi
        WHERE
            email_annuncio = ? AND
            nome_videogioco = ? AND
            console = ?
    ");
    $remove_messages -> bind_param(
        "sss",
        $removing_ad -> owner_email,
        $removing_ad -> v_name,
        $removing_ad -> console
    );

    # Esecuzione della query
    $remove_messages -> execute();

    # Rimozione dell'annuncio
    # Preparazione della query (la query è come sopra, cambia la tabella)
    $remove_ad = $conn -> prepare("
        DELETE FROM annunci
        WHERE
            email = ? AND
            nome_videogioco = ? AND
            console = ?
    ");
    $remove_ad -> bind_param(
        "sss",
        $removing_ad -> owner_email,
        $removing_ad -> v_name,
        $removing_ad -> console
    );

    # Esecuzione della query
    $remove_ad -> execute();

    # Check sull'avvenuta rimozione nella tabella "annunci"
    if ($conn -> affected_rows === 1) {
        # Ritorna una risposta affermativa
        $removed = 1;
        echo json_encode($removed);
    } else {
        # Risposta negativa
        $removed = 0;
        echo json_encode($removed);
    }

    # Chiusura degli statement e della connessione
    $remove_messages -> close();
    $remove_ad -> close();
    $conn -> close();

?>