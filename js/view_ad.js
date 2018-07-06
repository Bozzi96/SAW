"use strict";

window.addEventListener("load", function(){
    fetch("../php/get_ad_info.php", {
        credentials: 'same-origin'  // permette di inviare cookie vari al server
    })
    .then(response => response.json())
    .then(function(ad_info){
        document.getElementsByTagName("TITLE")[0].innerHTML = ad_info.nome_videogioco // titolo della pagina
        document.getElementById("ad_title").innerHTML = ad_info.nome_videogioco;
        document.getElementById("console").innerHTML = ad_info.console;
        document.getElementById("loan_length").innerHTML = ad_info.durata + " giorni";
        document.getElementById("price").innerHTML = ad_info.prezzo + " €";
    })
})