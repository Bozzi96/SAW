<?php

    # Sessione per mantenere traccia dei dati
    session_start();
    
    # Sanitizzazione dell'input
    function sanitize_input($conn, $str) {
        $str = trim($str);
        $str = $conn -> real_escape_string($str);
        return $str;
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
    $stmt -> bind_param("sssiis", $email, $v_name, $console, $loan_length, $price, $status);

    # Settaggio dei parametri ed esecuzione della query
    $email = "address@mail.com";    #TODO: get the email from the server session.
    $status = "Disponibile";
    $stmt -> execute();

    # Salvataggio della chiave primaria dell'annuncio nella sessione,
    # in modo tale da poterlo recuperare quando lo si inserisce.
    $_SESSION['email'] = $email;
    $_SESSION['v_name'] = $v_name;

    # Chiusura della connessione
    $stmt -> close();
    $conn -> close();

?>