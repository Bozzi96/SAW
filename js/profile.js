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

        //la pagina non viene mostrata finchè i campi non sono stati riempiti
        document.getElementsByTagName("BODY")[0].style.display = "none";
        fetch("../php/select_user.php", {
                credentials: "same-origin"             //mantiene i dati di sessione
        })
                .then(response => response.json())
                .then(function (user_data) {
                        document.getElementById("name").value = user_data[0];
                        document.getElementById("surname").value = user_data[1];
                        document.getElementById("email").innerHTML = user_data[2];
                        document.getElementById("city").value = user_data[3];
                        document.getElementById("province").value = user_data[4];
                        document.getElementById("cap").value = user_data[5];

                        if(!user_data[6]) {
                                for(var i=0; i<7; i++)
                                        document.getElementById("optional").outerHTML = "";

                                document.getElementById("panel-title").innerHTML = "Il profilo di " + user_data[0] + " " + user_data[1];
                                document.getElementById("finalButton").value = "Contatta";
                                document.getElementById("form").action= "chat.php";
                        }
                        //riempiti i campi, viene mostrata la pagina
                        document.getElementsByTagName("BODY")[0].style.display = "block";

                })

});



//funzione che notifica le modifiche
function displayChanges() {
        document.getElementById("changes").innerHTML = "Modifiche effettuate!";
        document.getElementById("changes").removeAttribute("hidden");
}
