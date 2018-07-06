/**
 * Questo script ottiene dal server le info relative
 * all'annuncio che si deve visualizzare. La pagina può essere
 * invocata sia dall'inserimento di un nuovo annuncio che dal
 * click su un particolare annuncio nella lista, quindi è
 * necessario distinguere i due casi.
 */

"use strict";

function fill_ad(ad_data) {
    document.getElementsByTagName("TITLE")[0].innerHTML = ad_data.nome_videogioco; // titolo della pagina
    document.getElementById("ad_title").innerHTML = ad_data.nome_videogioco;
    document.getElementById("console").innerHTML = ad_data.console;
    document.getElementById("loan_length").innerHTML = ad_data.durata + " giorni";
    document.getElementById("price").innerHTML = ad_data.prezzo + " €";
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


window.addEventListener("load", function(){
    if (this.sessionStorage.getItem("title")) {
        var title = this.sessionStorage.getItem("title");
        document.getElementById("ad_title").innerHTML = title;
        this.sessionStorage.clear();
        console.log("1");   
    } else {
        console.log("2");
    
    }
})