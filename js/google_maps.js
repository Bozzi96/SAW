"use strict";

// Regular map. il marker viene inserito nella mappa data una coppia (latitudine, longitudine)
function regular_map(latd,lngt) {
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
// Initialize maps
google.maps.event.addDomListener(window, 'load', getPosition);


/**
 * questa funzione recupera città e cap dal server attraverso una chiamata AJAX
 *  -->obsoleta se si usa la geolocalizzazione!
 */
function getInformation() {
    var xhttp;
    var myObj, myJSON, city, capValue,cityName;
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
            city = myObj.city_name;
            cityName = city.replace(/ /g, '');//rimuovo spazi nel nome
            capValue = myObj.cap_value;
            getLatLngt(cityName, capValue);
        }           
    }
    xhttp.open("GET","../php/get_informations.php", true);//!!
    xhttp.send();
}

/**
 * questa funzione ottiene latitudine e longitudine tramite API google partendo dalle info ottenute da "getInformation()"
 * 
 * @param {*} cityName 
 * @param {*} capValue 
 */
function getPosition(cityName, capValue ) {
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
            alert("Geolocalizzazione con raggio d'errore di: "+myObj.accuracy+" metri.");
            latd = myObj.location.lat;
            lngt = myObj.location.lng;
            regular_map(latd, lngt);
            
        }
    }
    xhttp.open("POST", "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyB58OmlW7yIXR--pf3dE5djLqEVI0UqujY", true);//!!
    xhttp.send();
}
