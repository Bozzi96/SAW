/*
 * Questo script ottiene dal server le info relative
 * all'annuncio che si deve visualizzare. La pagina può essere
 * invocata sia dall'inserimento di un nuovo annuncio che dal
 * click su un particolare annuncio nella lista, quindi è
 * necessario distinguere i due casi.
 * 
 *  + instanziazione mappa sulla base della posizione registrata durante SignUp
 * 
 */

"use strict";

// Regular map. il marker viene inserito nella mappa data una coppia (latitudine, longitudine)
function regular_map(latd, lngt) {
    var var_location = new google.maps.LatLng(latd, lngt); //definisce un punto nel globo!

    var var_mapoptions = {  //opzioni aggiuntive
        center: var_location,
        zoom: 14
    };

    var var_map = new google.maps.Map(document.getElementById("map-container"), //inizializza la mappa nel dom
        var_mapoptions);

    var var_marker = new google.maps.Marker({ //setta il marker
        position: var_location,
        map: var_map,
    });
}

/**
 * questa funzione ottiene latitudine e longitudine tramite API google partendo dalle info ottenute da "getInformation()"
 * 
 * @param {*} cityName 
 * @param {*} capValue 
 */
function getLatLngt(cityName, capValue) {
    var xhttp;
    var myObj, myJSON, latd, lngt;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);//parsa i dati arrivati in formato JSON
            //dobbiamo aquisire latitudine e longitudine
            if (myObj.status == "OK") {
                latd = myObj.results[0].geometry.location.lat;
                lngt = myObj.results[0].geometry.location.lng;
                regular_map(latd, lngt);
            } else {
                alert("error occuring in decoding position");
            }
        }
    }
    xhttp.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?address=" + cityName + "+" + capValue + "&key=AIzaSyB58OmlW7yIXR--pf3dE5djLqEVI0UqujY", true);//!!
    xhttp.send();
}



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

    getLatLngt(ad_data.citta, ad_data.cap);//ottieni lat e long per mappa
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