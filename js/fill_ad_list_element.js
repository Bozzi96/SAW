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
    .then(ads_data => display_ads(ads_data))
}

/**
 * Stampa a video gli annunci raccolti dal server in una
 * lista costruita dinamicamente. Ogni annuncio è costruito
 * a partire dai dati ritornati dal server.
 * 
 * @param ads_data Info degli annunci ottenuti dal server
 */
function display_ads(ads_data) {
    // Inserimento di un annuncio per ogni entry dell'array "ads_data"
    ads_data.forEach(ad_data => {
        // Generazione codice HTML dell'annuncio
        var ad_code = create_ad();
        // Inserimento info all'interno del codice dell'annuncio
        var current_ad = fill_ad(ad_code, ad_data);
        // Aggiunta dell'annuncio nella lista per la visualizzazione
        append_ad(current_ad);
    })
}

/**
 * Concatena l'annuncio alla lista della pagina.
 * 
 * @param ad Annuncio da concatenare
 */
function append_ad(ad) {
    // Selezione della lista dove inserire l'annuncio
    var ads_list = document.getElementById("ads_list");
    // Aggiunta in coda dell'annuncio riempito
    ads_list.appendChild(ad);
}

/**
 *
 * Riempie l'annuncio con le informazione ottenute
 * dal server.
 * 
 * @param ad_code Annuncio da riempire
 * @param ad_data Informazioni relative all'annuncio
 * 
 */
function fill_ad(ad_code, ad_data) {

    // Copia del template importato:
    // la proprietà "content" possiede tutto il codice del template,
    // "true" indica di importare anche i sotto-componenti del template
    var ad = document.importNode(ad_code.content, true);

    // Selezione del titolo dell'annuncio
    var title = ad.querySelector("h1.card-title");
    // Seleziona i 3 campi dove inserire i dati dell'annuncio
    var fields = ad.querySelectorAll("div.col-sm-5");

    // Inserimento dei dati nell'annuncio
    title.innerHTML = ad_data.nome_videogioco;
    fields[0].innerHTML = ad_data.console;
    fields[1].innerHTML = ad_data.durata;
    fields[2].innerHTML = ad_data.prezzo;

    return ad;
}

/**
 * Genera il codice HTML per visualizzare
 * l'annuncio all'interno della lista.
 */
function create_ad() {
    // Il codice HTML per l'annuncio è memorizzato dentro il
    // tag <template> all'interno della pagina

    // Test sulla compatibilità del browser riguardo ai template
    if ("content" in document.createElement("template")) {
        
        // Istanziazione dell'annuncio
        var ad_code = document.querySelector("#ad_template");
    }
    else {
        // TODO: comunicare l'incompatibilità del browser con i template
    }

    return ad_code;
}

window.addEventListener("load", get_ad_data());