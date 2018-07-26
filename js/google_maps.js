"use strict";

// Regular map. il marker viene inserito nella posizione attuale attraverso la geolocalizzazione
function regular_map(latd, lngt) {
    var var_location = new google.maps.LatLng(latd, lngt); //definisce un punto nel globo!
    
    var var_mapoptions = { //opzioni aggiuntive
        center: var_location,
        zoom: 14
    };
    var map = new google.maps.Map(document.getElementById("map-container"), //inizializza la mappa nel dom
    var_mapoptions);
    
    var infoWindow = new google.maps.InfoWindow;
    
    //HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            
            infoWindow.setPosition(pos);
            infoWindow.setContent('Siete qui.');
            infoWindow.open(map);
            //setta il marker
            var var_marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: "SEI QUI!"
            });
            
            map.setCenter(pos);
        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
    
    // Initialize maps
    google.maps.event.addDomListener(window, 'load', getInformation);
    
    
    /**
    * questa funzione recupera città e cap dal server attraverso una chiamata AJAX
    *  (-->obsoleta se si usa la geolocalizzazione!)
    * in ogni caso viene usata per recuperare dal server la posizione dell'utente inserita in fase si SignUp
    */
    function getInformation() {
        var xhttp;
        var myObj, myJSON, city, capValue, cityName;
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
                city = myObj.city_name;
                cityName = city.replace(/ /g, ''); //rimuovo spazi nel nome
                capValue = myObj.cap_value;
                getLatLngt(cityName, capValue);
            }
        }
        xhttp.open("GET", "../php/get_informations.php", true);
        xhttp.send();
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