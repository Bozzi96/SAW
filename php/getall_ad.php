<?php

    /*
    Questo script ottiene dal database tutti gli annunci, li converte in JSON
    e li passa allo script JS che li visualizza nell'elenco.
    */

    # E' necessario essere autenticati per ottenere tutti gli annunci (?)
    session_start();

    # Connessione al db
    require '../db/connection.php';

    # Ottenimento parametri di ricerca
    $stmt= null;
    if (isset($_SESSION['search_param'])) {

        # Console secondo cui eseguire la ricerca
        $console = $_SESSION['search_param']['console'];

        if (empty($_SESSION['search_param']['v_name'])) {

            # L'utente cerca solo per console, qualsiasi videogioco va bene.
            # Di conseguenza la query ha solamente la condizione sulla console.
            $stmt = $conn -> prepare("
                SELECT email, nome_videogioco, console, prezzo, durata
                FROM annunci
                WHERE console = ? AND stato = 'Disponibile'
            ");
            $stmt -> bind_param("s", $console);

        } else {
            # L'utente sta cercando un videogioco particolare.
            # La query ha una condizione in più.

            # I due "%" servono per il LIKE nella query:
            # dicono di cercare qualsiasi videogioco abbia una sottostringa come $v_name.
            $v_name = "%" . $_SESSION['search_param']['v_name'] . "%";
            $stmt = $conn -> prepare("
                SELECT email, nome_videogioco, console, prezzo, durata
                FROM annunci
                WHERE nome_videogioco LIKE ? AND console = ? AND stato = 'Disponibile'
            ");
            $stmt -> bind_param("ss", $v_name, $console);
        }
    }

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