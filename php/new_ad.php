<?php

    # Sanitizzazione dell'input
    function sanitize_input($conn, $str) {
        $str = trim($str);
        $str = $conn -> real_escape_string($str);
        return $str;
    }

    # Sessione per mantenere traccia dei dati
    session_start();
    
    # Connessione al db
    require '../db/connection.php';

    # Raccolta delle info dell'annuncio
    $v_name = sanitize_input($conn, $_POST['v_name']);
    $console = sanitize_input($conn, $_POST['console']);
    $loan_length = $_POST['loan_length'];
    $price = $_POST['price'];

    # Preparazione dello statement per il database
    $stmt = $conn -> prepare("INSERT INTO annunci (email, nome_videogioco, console, prezzo, durata, stato) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt -> bind_param("sssiis", $email, $v_name, $console, $price, $loan_length, $status);

    # Settaggio dei parametri ed esecuzione della query
    $email = $_SESSION['utente']['email'];    #TODO: get the email from the server session.
    $status = "Disponibile";
    $stmt -> execute();

    # Setting della variabile di sessione per mostrare l'avvenuto inserimento
    $_SESSION['new_ad'] = true;

    # Chiusura della connessione
    $stmt -> close();
    $conn -> close();

    # Reindirizzamento alla pagina di visualizzazione annuncio
    header("location: ../pages/my_ads.php");
    exit(); # same as die()

?>