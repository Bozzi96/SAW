/*
 * Questo script ottiene dal server le info relative
 * all'annuncio che si deve visualizzare. La pagina può essere
 * invocata sia dall'inserimento di un nuovo annuncio che dal
 * click su un particolare annuncio nella lista, quindi è
 * necessario distinguere i due casi.
 */

"use strict";

function fill_ad(ad_data) {

    // Filling dell'annuncio
    document.getElementsByTagName("TITLE")[0].innerHTML = ad_data.nome_videogioco; // titolo della pagina
    document.getElementById("ad_title").innerHTML = ad_data.nome_videogioco;
    document.getElementById("console").innerHTML = ad_data.console;
    document.getElementById("loan_length").innerHTML = ad_data.durata + " giorni";
    document.getElementById("price").innerHTML = ad_data.prezzo + " €";

    // Filling del proprietario dell'annuncio
    document.getElementById("ad_owner").innerHTML = ad_data.nome + " " + ad_data.cognome;
    document.getElementById("location").innerHTML = ad_data.citta + ", " + ad_data.provincia;

    // Recupero immagine casuale per la foto profilo
    var profile_img = document.getElementById("profile_img");
    profile_img.setAttribute("src", ("https://api.adorable.io/avatars/300/" + ad_data.email));
}

function display_inserted_ad() {
    fetch("../php/get_ad_info.php", {
        // Permette di inviare cookie vari al server, quindi di mantenere la sessione
        credentials: 'same-origin'
    })
    .then(response => response.json())
    .then(ad_data => fill_ad(ad_data))
}

function display_clicked_ad(ad_info) {
    fetch("../php/get_ad_info.php", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: ad_info
    })
    .then(response => response.json())
    .then(ad_data => fill_ad(ad_data))
    // NELLO SCRIPT PHP BISOGNA OTTENERE IL JSON. DA LÌ CONTINUARE.
}

function display_ad() {
    // Check sull'origine della richiesta di visualizzazione annuncio
    let clicked_ad = window.sessionStorage.getItem("ad_info");
    if (clicked_ad !== null) {
        // Visualizza l'annuncio cliccato
        display_clicked_ad(clicked_ad);
    } else {
        // Visualizza l'annuncio inserito
        display_inserted_ad();
    }
}


window.addEventListener("load", function(){
    display_ad();
});