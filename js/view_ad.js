/*
 * Questo script ottiene dal server le info relative
 * all'annuncio che si deve visualizzare. La pagina può essere
 * invocata sia dall'inserimento di un nuovo annuncio che dal
 * click su un particolare annuncio nella lista, quindi è
 * necessario distinguere i due casi.
 */

"use strict";

/**
 * Inserisce nel codice dell'annuncio i dati ottenuti dal server.
 * @param {*} ad_data Dati dell'annuncio restituiti dal server
 */
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

    // Passa le coordinate per visualizzare la mappa
    getLatLngt(ad_data.citta, ad_data.cap);
}

/**
 * Visualizza le informazioni di un particolare annuncio.
 * Quest'ultimo è stato cliccato nella pagina dei risultati
 * della ricerca.
 * @param {*} ad_info Dati dell'annuncio necessari al server per recuperare
 *          tutte le info dal database
 */
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
    .then(ad_data => fill_ad(ad_data));
}

/**
 * Ottiene dal server tutti i messaggi relativi ad un particolare
 * annuncio.
 * @param {*} current_ad_json Info dell'annuncio in formato JSON
 *      da passare al server per ottenere i messaggi relativi ad esso.
 */
function get_messages(current_ad_json) {
    fetch("../php/getall_messages.php", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: current_ad_json
    })
    .then(response => response.json())
    .then(messages_data => display_messages(messages_data));
}

/**
 * Inserisce nella chat dell'annuncio tutti i messaggi
 * relativi ad esso.
 * @param {*} messages Tutti i messaggi relativi all'annuncio
 */
function display_messages(messages) {
    let chat = document.getElementById("messages_container");
    // La chat viene ricaricata da zero
    chat.innerHTML = "";
    // Inserimento del messaggio per ogni entry dell'array "messages"
    messages.forEach(message => {

        // Generazione codice HTML del messaggio
        var message_code = create_message();

        // Inserimento dati all'interno del codice del messaggio
        var current_message = fill_message(message_code, message);
        
        // Aggiunta del messaggio nel container per la visualizzazione
        append_message(current_message);
    });
    // E' utile mostrare prima i messaggi più recenti
    chat.scrollTop = chat.scrollHeight;
}

/**
 * Inserisce il messaggio completo dei dati all'interno della chat.
 * @param {*} message Messaggio da inserire
 */
function append_message(message) {
    // Selezione del container dove inserire il messaggio
    var container = document.getElementById("messages_container");
    // Aggiunta del messaggio
    container.appendChild(message);
}

/**
 * Inserisce i dati del messaggio all'interno del codice della pagina.
 * @param {*} message_code Template del codice del messaggio
 * @param {*} message_data Dati relativi al messaggio
 */
function fill_message(message_code, message_data) {

    // Copia del template importato:
    // la proprietà "content" possiede tutto il codice del template,
    // "true" indica di importare anche i sotto-componenti del template
    var message = document.importNode(message_code.content, true);

    // Selezione dei campi in cui inserire l'autore del messaggio, il testo e l'ora
    var sender = message.querySelector("p.message_sender");
    var message_text = message.querySelector("span.message_text");
    var message_time = message.querySelector("p.message_time");

    // Inserimento dei dati nei campi del messaggio
    sender.innerHTML = message_data.nome + " " + message_data.cognome;
    message_text.innerHTML = message_data.contenuto.replace(/\\/g, "");
    message_time.innerHTML = format_date(new Date(message_data.tstamp * 1000));

    // Se l'autore del messaggio è il proprietario dell'annuncio si evidenzia
    if (current_ad.owner_email === message_data.autore) {
        sender.style.color = " #428bca";
    }

    return message;
}

/**
 * Formatta la data ottenuta dal database in questo modo: "gg-mese, hh:mm".
 * @param {*} date Data da formattare (millis since epoch)
 */
function format_date(date) {
    var months = [
        "gennaio", "febbraio", "marzo", "aprile",
        "maggio", "giugno", "luglio", "agosto",
        "settembre", "ottobre", "novembre", "dicembre"
    ];
    var day_number = date.getDate();
    var index = date.getMonth();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    
    // Se i minuti sono tra 0,9, preponi uno zero davanti
    if (minutes < 10) {
        var formatted_minutes = "0" + minutes;
    } else {
        formatted_minutes = minutes;
    }

    return day_number + " " + months[index] + ", " + hours + ":" + formatted_minutes;
}

/**
 * Ottiene dalla pagina html il codice per inserire un nuovo messaggio.
 */
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

/**
 * Invia il nuovo messaggio all'interno della chat dell'annuncio.
 * @param {*} current_ad Annuncio attualmente visualizzato
 */
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
    .then(response => response.json())
    .then(sent => {
        if (sent === 1) {
            // Se l'invio è andato a buon fine, l'intera chat viene aggiornata
            get_messages(current_ad_json);
        } else {
            window.console.log("Messaggio non inviato!");
        }
    });
}


/**
 * Rende l'annuncio venduto e modifica la pagina di conseguenza
 */
function buy_ad(current_ad_json) {
    
    fetch("../php/buy_ad.php", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: current_ad_json
    })
    .then(response=>response.json())
    .then(data => {
        // Visualizzazione conferma dell'acquisto
        document.getElementById("buyButton").innerText = "Comprato!";
        document.getElementById("buyButton").disabled = "disabled";
        document.getElementById("image_venduto").removeAttribute("hidden");

        // Reindirizzamento nella pagina "Annunci acquistati" dopo .5 secondi
        setTimeout(function() {
            // Passaggio di un flag alla pagina per visualizzare il banner di conferma
            var purchased = 1;
            window.sessionStorage.setItem("flag", JSON.stringify(purchased));
            window.location.href = "../pages/purchased_ads.php";
        }, 1000);
    })
}

function display_buyButton(current_ad_json) {
    fetch("../php/get_buyButton.php", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: current_ad_json
    })
    .then(response=>response.json())
    .then(ad_status=> {
        window.console.log(ad_status);
        if (ad_status === 1) {
            document.getElementById("buyButton").removeAttribute("hidden");
        }
    })
}

// Recupero delle info dell'annuncio: rimangono memorizzate qui
// così che le future chiamate ajax non debbano riprenderle ogni volta.
var current_ad_json = window.sessionStorage.getItem("ad_info");

// Le informazioni dell'annuncio sono disponibili mediante l'oggetto seguente
var current_ad = JSON.parse(current_ad_json);

window.addEventListener("load", function(){
    // Visualizza informazioni dell'annuncio
    display_clicked_ad(current_ad_json);
    // Visualizza il bottone "Compra"
    display_buyButton(current_ad_json);
    // Visualizzazione della chat
    get_messages(current_ad_json);
});