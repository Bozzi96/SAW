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
}

function display_ad(clicked_ad) {
    // Check sull'origine della richiesta di visualizzazione annuncio
    if (clicked_ad !== null) {
        // Visualizza l'annuncio cliccato
        display_clicked_ad(clicked_ad);
    } else {
        // Visualizza l'annuncio inserito
        display_inserted_ad();
    }
}

function display_messages(messages) {
    // Inserimento del messaggio per ogni entry dell'array "messages"
    messages.forEach(message => {

        // Generazione codice HTML del messaggio
        var message_code = create_message();

        // Inserimento dati all'interno del codice del messaggio
        var current_message = fill_message(message_code, message);
        
        // Aggiunta del messaggio nel container per la visualizzazione
        append_message(current_message);
    });
}

function append_message(message) {
    // Selezione del container dove inserire il messaggio
    var container = document.getElementById("messages_container");
    // Aggiunta del messaggio
    container.appendChild(message);
}

function fill_message(message_code, message_data) {

    // Copia del template importato:
    // la proprietà "content" possiede tutto il codice del template,
    // "true" indica di importare anche i sotto-componenti del template
    var message = document.importNode(message_code.content, true);

    // Selezione dei campi in cui inserire l'autore del messaggio, il testo e l'ora
    var sender = message.querySelector("p.message_sender");
    var message_text = message.querySelector("p.message_text");
    var message_time = message.querySelector("p.message_time");

    // Inserimento dei dati nei campi
    sender.innerHTML = message_data.autore;
    message_text.innerHTML = message_data.contenuto;
    message_time.innerHTML = message_data.tstamp;

    return message;

}

function create_message() {
    // Stessa routine della funzione "create_ad" in fill_ad_list_element.js

    // Test sulla compatibilità del browser riguardo ai template
    if ("content" in document.createElement("template")) {
        
        // Istanziazione dell'annuncio
        var message_code = document.querySelector("#message_template");
    }
    else {
        // TODO: comunicare l'incompatibilità del browser con i template
    }

    return message_code;

}

function send_message(current_ad) {
    // Ottenimento del testo del messaggio
    var message_text = document.getElementById("message").value;
    document.getElementById("message").value = "";
    // Se il messaggio è vuoto non viene inviato
    if ( message_text.trim() === "") {
        return;
    }
    // Impacchettamento dei dati necessari all'invio
    var message = JSON.stringify({
        "target_ad": current_ad,  // L'annuncio relativo al messaggio
        "message_text": message_text  // Contenuto del messaggio
    });
    // Invio del messaggio al server
    fetch("../php/send_message.php", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: message
    })
    // Lo script php restituisce un flag per verificare l'invio
    .then(response => response.json())
    .then(sent => {
        if (sent === 0) {
            window.console.log("Messaggio non inviato!");
        } 
    })
}

// Recupero delle info dell'annuncio: rimangono memorizzate
// qui così che le future chiamate ajax non debbano riprenderle ogni volta.
var clicked_ad = window.sessionStorage.getItem("ad_info");

// Le informazioni dell'annuncio sono disponibili mediante l'oggetto seguente
var current_ad = JSON.parse(clicked_ad);

window.addEventListener("load", function(){
    display_ad(clicked_ad);
});