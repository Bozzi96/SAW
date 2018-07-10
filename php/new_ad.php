<?php

    /*
     * Questo script memorizza sul database l'annuncio appena inserito dall'utente
     * mediante la pagina "new_ad_form.php".
    */

    # Sanitizzazione dell'input
    function sanitize_input($conn, $str) {
        $str = trim($str);
        $str = $conn -> real_escape_string($str);
        $str = filter_var($str, FILTER_SANITIZE_STRING);
        return $str;
    }

    # Sessione per mantenere traccia dei dati
    session_start();
    if (!isset($_SESSION['utente'])) {
        die("Inserimento fallito: nessun utente loggato sul sito.");
    }

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
    $email = $_SESSION['utente']['email'];
    $status = "Disponibile";
    $stmt -> execute();

    # Array di sessione per indicare che è appena stato inserito un nuovo annuncio.
    # Necessario per il redirect finale, così può sapere quale annuncio visualizzare.
    $new_ad = array(
        "email" => $email,
        "v_name" => $v_name,
        "console" => $console
    );
    $_SESSION['new_ad'] = $new_ad;

    # Chiusura della connessione
    $stmt -> close();
    $conn -> close();

    # Reindirizzamento alla pagina di visualizzazione annuncio
    header("location: ../html/view_ad.html");
    exit(); # same as die()

?>