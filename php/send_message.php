<?php

    /**
     * Inserisce nel database i messaggi che i vari utenti inviano
     * di volta in volta all'interno di un particolare annuncio.
    **/

    # Sanitizzazione dell'input
    function sanitize_input($conn, $str) {
        $str = trim($str);
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
    
    # TODO: recuperare i dati relativi al messaggio dalla chiamata AJAX (sanitizzare)

    # Eseguire la query con i prepared statements

    # Restituire la conferma dell'avvenuto invio.


?>