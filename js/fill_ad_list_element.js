/**
 * Questo script ottiene i dati degli annunci dal server
 * e li carica dinamicamente nella lista.
 */

"use strict";

/**
 * Ottiene tutti i dati di tutti gli annunci
 * memorizzati nel server.
 */
function get_ad_data() {
    fetch("../php/getall_ad.php")
    .then(response => response.json())
    .then(ad_data => fill_ad(ad_data))
}

/**
 * Inserisce i dati ottenuti con "get_ad_data()"
 * in un nuovo annuncio.
 */
function fill_ad(ad_data) {
    // TODO: e se avessi più di un annuncio?
    create_ad();
    document.getElementById("ad_title").innerHTML = ad_data[0].nome_videogioco;
    document.getElementById("console").innerHTML = ad_data[0].console;
    document.getElementById("loan_length").innerHTML = ad_data[0].durata;
    document.getElementById("price").innerHTML = ad_data[0].prezzo;
}

/**
 * Genera il codice HTML per visualizzare
 * l'annuncio all'interno della lista.
 */
function create_ad() {
    // Ottenimento del codice HTML dell'annuncio dalla pagina html
    var ad = document.getElementById("ad_template").innerHTML;
    // Concatenazione dell'annuncio (ancora vuoto) alla lista
    var list = document.getElementById("ads_list").innerHTML += ad;
}

window.addEventListener("load", get_ad_data());