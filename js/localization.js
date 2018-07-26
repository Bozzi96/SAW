/*  instanziazione mappa sulla base della posizione registrata durante SignUp
*/

"use strict";

// Regular map. il marker viene inserito nella mappa data una coppia (latitudine, longitudine)
function regular_map(latd, lngt) {
    var var_location = new google.maps.LatLng(latd, lngt); //definisce un punto nel globo!
    
    var var_mapoptions = { //opzioni aggiuntive
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
            myObj = JSON.parse(this.responseText); //parsa i dati arrivati in formato JSON
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
    xhttp.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?address=" + cityName + "+" + capValue + "&key=AIzaSyB58OmlW7yIXR--pf3dE5djLqEVI0UqujY", true); //!!
    xhttp.send();
}