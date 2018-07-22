<?php

    /**
     * Questo script ritorna "1" se è stato appena inserito un nuovo
     * annuncio, altrimenti "0". Necessario per mostrare il banner di
     * avvenuto inserimento.
    **/

    # Sessione per ottenere il valore del flag
    if (!isset($_SESSION)) {
        session_start();
    }
    
    # Check sull'inserimento e risposta opportuna
    if (isset($_SESSION['new_ad']) && $_SESSION['new_ad']) {
        $new_ad_inserted = 1;
        echo json_encode($new_ad_inserted);
    } else {
        $new_ad_inserted = 0;
        echo json_encode($new_ad_inserted);
    }

    # Unset della variabile
    unset($_SESSION['new_ad']);

?>