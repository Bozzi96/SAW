/*
 * Questo script ottiene i dati degli annunci pubblicati
 * dall'utente loggato e li carica dinamicamente
 * nella lista della pagina.
 */

"use strict";

/**
 * Ottiene tutti i dati di tutti gli annunci
 * memorizzati nel server.
 */
function get_ad_data() {
    fetch("../php/getall_my_ads.php")
    .then(response => response.json())
    .then(ads_data => display_ads(ads_data))
}

/**
 * Verifica la lista di annunci è vuota o meno.
 * @param {*} obj  info degli annunci ottenuti da server
 */
function isEmpty(obj) {
    for (var prop in obj) {
        if (obj.hasOwnProperty(prop))
            return false;
    }
    return true;
}

/**
 * Stampa a video gli annunci raccolti dal server in una
 * lista costruita dinamicamente. Ogni annuncio è costruito
 * a partire dai dati ritornati dal server.
 * 
 * @param ads_data Info degli annunci ottenuti dal server
 */
function display_ads(ads_data) {
    if(isEmpty(ads_data)){
        document.getElementById("negative_answer").innerHTML = 
            "Non hai pubblicato alcun annuncio.";
        document.getElementById("negative_answer").removeAttribute("hidden");
        document.getElementById("fix-footer").innerHTML = "<br><br><br><br><br><br><br><br>";
    }
    // Inserimento di un annuncio per ogni entry dell'array "ads_data"
    ads_data.forEach(ad_data => {
        // Generazione codice HTML dell'annuncio
        var ad_code = create_ad();
        // Inserimento info all'interno del codice dell'annuncio
        var current_ad = fill_ad(ad_code, ad_data);
        // Aggiunta dell'annuncio nella lista per la visualizzazione
        append_ad(current_ad);
    });
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
    title.dataset.owner_email = ad_data.email; // metadato: è la mail del proprietario
    fields[0].innerHTML = ad_data.console;
    fields[1].innerHTML = ad_data.durata + " giorni";
    fields[2].innerHTML = ad_data.prezzo + " €";

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

/**
 * Raccoglie le informazioni riguardo l'annuncio cliccato e
 * carica la pagina di visualizzazione passandole i dati raccolti.
 * @param {*} event Ciò che ha provocato la chiamata di questa funzione
 */
function show_ad(event) {
    // Bottone che ha catturato l'evento
    let button = event.target;

    if (button.className.includes("dettagli")) {
        // Si vuole visualizzare l'annuncio nel dettaglio
        let ad_info = get_ad_from_list(button);

        // Salvataggio dei dati in sessionStorage così da poter essere recuperati
        // dalla pagina "view_ad.html"
        sessionStorage.setItem("ad_info", ad_info);

        // Redirect verso la pagina di visualizzazione annuncio
        window.location.href = "../pages/view_ad.php";
    }
    else if (button.className.includes("rimuovi")) {
        // L'utente vuole rimuovere l'annuncio (e ha già confermato)
        let ad_info = get_ad_from_list(button);
        
        // Rimozione dell'annuncio dal database
        fetch("../php/remove_ad.php", {
            method: "POST",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: ad_info
        })
        .then(response => response.json())
        .then(removed => {
            if (removed === 1) {
                // Rimozione avvenuta con successo.
                // La pagina viene ricaricata by-passando la cache
                window.location.reload(true);
            } else {
                window.console.log("Annuncio non rimosso!");
            }
        });

    } else {
        // Non è stato cliccato un bottone all'interno della lista
        return;
    }
}

/**
 * Ottiene le informazioni dell'annuncio su cui è stato cliccato
 * uno dei bottoni disponibili.
 * @param {*} button Bottone cliccato nella lista
 */
function get_ad_from_list(button) {
    // Recupero delle informazioni riguardo all'annuncio cliccato
    let clicked_ad = button.closest("div.card");
    let title = clicked_ad.getElementsByClassName("card-title")[0];
    let fields = clicked_ad.getElementsByClassName("col-sm-5");

    // Codifica in formato JSON per poter essere passate al server nella richiesta
    let ad_info = JSON.stringify({
        "owner_email": title.dataset.owner_email,
        "v_name": title.innerHTML,
        "console": fields[0].innerHTML, // console
    });

    return ad_info;
}

function new_ad_check() {
    fetch("../php/new_ad_check.php")
    .then(response => response.json())
    .then(new_ad_inserted => {
        var alert = document.getElementById("new_ad_alert");
        if (new_ad_inserted === 1) {
            alert.className += " alert-success"; // spazio iniziale essenziale
            alert.innerHTML = "Annuncio inserito correttamente."
            alert.removeAttribute("hidden");
        }
    })
}

// A caricamento completato, la pagina inizia a recuperare i dati dal server
window.addEventListener("load", function(){
    // Visualizzazione alert di avvenuto inserimento
    new_ad_check();
    get_ad_data();
});
// Per ogni annuncio nella lista si collega un listener per visualizzare
// la pagina di dettaglio.
var list = document.getElementById("ads_list");
list.addEventListener("click", show_ad);