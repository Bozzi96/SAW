<?php

    /*
    Questo script ottiene dal database tutti gli annunci, li converte in JSON
    e li passa allo script JS che li visualizza nell'elenco.
    */

    # E' necessario essere autenticati per ottenere tutti gli annunci (?)
    session_start();

    # Connessione al db
    require '../db/connection.php';

    # Interrogazione del database:
    # Nella query non c'è alcun input inserito dall'utente, quindi si può
    # eseguire senza l'aiuto dei prepared statements.
    $query = "SELECT nome_videogioco, console, prezzo, durata FROM annunci WHERE stato = 'Disponibile'";
    $result = $conn -> query($query);
    
    # Dato che il risultato della query prevede più righe, il salvataggio avviene
    # in un array di oggetti, ognuno contente una riga.
    $rows = array();
    while ($current_obj = $result -> fetch_object()) {
        $rows[] = $current_obj;
    }

    # Codifica del risultato in formato JSON
    $result_json = json_encode($rows);
    echo $result_json;

    # Rilascio del result set
    $result -> close();

    # Chiusura della connessione
    $conn -> close();

?>