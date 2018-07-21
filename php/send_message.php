<?php

    /**
     * Inserisce nel database i messaggi che i vari utenti inviano
     * di volta in volta all'interno di un particolare annuncio.
    **/

    # Sanitizzazione dell'input
    function sanitize_input($conn, $str) {
        $str = trim($str);
        $str = htmlspecialchars($str);
        $str = $conn -> real_escape_string($str);
        return $str;
    }

    session_start();
    # Controllo sul login
    if (!isset($_SESSION['utente'])) {
        die("Impossibile inviare il messaggio. Nessun utente loggato.");
    }

    # Connessione al database
    require '../db/connection.php';

    # Raccolta delle informazioni per effettuare la query.

    # L'autore del messaggio è sempre l'utente attualmente loggato nel sito.
    $sender = $_SESSION['utente']['email'];
    # Dati in arrivo dal client (annuncio corrente, contenuto del messaggio)
    $message = json_decode(file_get_contents("php://input"));
    $target_ad = $message -> target_ad;
    $message_text = sanitize_input($conn, $message -> message_text);

    # Preparazione della query
    # Il primo NULL è dovuto all'auto increment, il secondo al timestamp
    $stmt = $conn -> prepare("INSERT INTO messaggi VALUES (NULL, ?, ?, ?, ?, ?, NULL)");
    $stmt -> bind_param(
        "sssss",
        $sender,
        $target_ad -> owner_email,
        $target_ad -> v_name,
        $target_ad -> console,
        $message_text
    );
    
    # Esecuzione della query
    $stmt -> execute();

    # Check sull'avvenuto inserimento
    if ($conn -> affected_rows === 1) {
        # Ritorna una risposta affermativa
        $sent = 1;
        echo json_encode($sent);
    } else {
        # Risposta negativa
        $sent = 0;
        echo json_encode($sent);
    }

    # Chiusura dello statement e della connessione
    $stmt -> close();
    $conn -> close();

?>