<?php

    /**
     * Questo script ottiene dal database l'intera chat riguardo un
     * particolare annuncio. Invocato dal file "view_ad.js".
    **/

    session_start();
    # Controllo sul login
    if (!isset($_SESSION['utente'])) {
        die("Nessun utente loggato.");
    }

    # Connessione al database
    require '../db/connection.php';

    # Ottenimento dell'annuncio per cui si vuole visualizzare la chat
    $current_ad = json_decode(file_get_contents("php://input"));

    # Preparazione della query
    $stmt = $conn -> prepare("
        SELECT u.nome, u.cognome, m.contenuto, UNIX_TIMESTAMP(m.tstamp) AS tstamp, m.autore
        FROM messaggi AS m JOIN utenti AS u ON m.autore = u.email
        WHERE email_annuncio = ? AND nome_videogioco = ? AND console = ?
        ORDER BY tstamp ASC
    ");
    $stmt -> bind_param(
        "sss",
        $current_ad -> owner_email,
        $current_ad -> v_name,
        $current_ad -> console
    );

    # Esecuzione della query
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