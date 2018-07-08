"use strict";
//rimuove l'attributo readOnly da tutti i campi del form
function modify() {
        document.getElementById("name").readOnly = false;
        document.getElementById("surname").readOnly = false;
        document.getElementById("city").readOnly = false;
        document.getElementById("province").readOnly = false;
        document.getElementById("cap").readOnly = false;
};

function oneChange(element) {
        document.getElementById(element).readOnly = false;
        document.getElementById(element).focus();
};

//funzione per riempire correttamente i campi al caricamento della pagina
window.addEventListener("load", function () {
        fetch("/vgSwapper/php/select_user.php", {
                credentials: "same-origin"             //mantiene i dati di sessione
        })
                .then(response => response.json())
                .then(function (user_data) {
                        document.getElementById("name").value = user_data[0];
                        document.getElementById("surname").value = user_data[1];
                        document.getElementById("city").value = user_data[2];
                        document.getElementById("province").value = user_data[3];
                        document.getElementById("cap").value = user_data[4];
                })

});

 /*
 //Metodo per eliminare n elementi con lo stesso id (in caso si decida di non duplicare gran parte della pagina)
window.addEventListener("load", function() {
        for(var i=0; i<n; i++)
        document.getElementById("optional").outerHTML = "";

        document.getElementById("finalButton").value = "Contatta";
        document.getElementById("form").action= "chat.php";
});
*/

//funzione che notifica le modifiche
function displayChanges() {
        document.getElementById("changes").innerHTML = "Modifiche effettuate!";
        document.getElementById("changes").removeAttribute("hidden");
}
