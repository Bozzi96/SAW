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
                        document.getElementById("feedPos").innerHTML =user_data[6];
                        document.getElementById("feedNeg").innerHTML = user_data[7];
                        //calcolo affidabilià, fermandosi alla seconda cifra decimale
                        var trust=0;
                        if(user_data[6]!=0 || user_data[7]!=0)
                                //se ho almeno un feedback, posso calcolare l'affidabilità
                                trust =  ((user_data[6] / (user_data[6] + user_data[7]) )*100).toFixed(2); 
                       
                        document.getElementById("percentage").innerHTML = trust + "%";
                                

                        if(!user_data[8]) {
                        //Se il profilo visualizzato è quello di un altro utente, si modificano certi elementi della pagina
                                for(var i=0; i<7; i++)
                                        document.getElementById("optional").outerHTML = "";
                                document.getElementById("panel-title").innerHTML = "Il profilo di " + user_data[0] + " " + user_data[1];
                                document.getElementById("finalButton").value = "Contatta";
                                document.getElementById("form").action= "chat.php";

                        }
                         //rimuovo la possibilità di inserire un feedback, se sono nella pagina del  mio profilo
                         
                         var removeFeed= document.getElementById("feedbackElements");
                         removeFeed.parentNode.removeChild(removeFeed);
                         
                        //riempiti i campi, viene mostrata la pagina
                        document.getElementsByTagName("BODY")[0].style.display = "block";

                })

});

function displayFeedback(returnValue) {
        if(returnValue==-1) {
                document.getElementById("afterFeedback").innerHTML = "Impossibile valutare questo utente";
                document.getElementById("afterFeedback").className = "alert alert-danger";
        }
        if(returnValue==0) {
                document.getElementById("afterFeedback").innerHTML = "Feedback uguale a prima";
                document.getElementById("afterFeedback").className = "alert alert-warning";
        }
        if(returnValue==1) {
                document.getElementById("afterFeedback").innerHTML = "Feedback aggiornato";
                document.getElementById("afterFeedback").className = "alert alert-success";
        }
        if(returnValue==2) {
                document.getElementById("afterFeedback").innerHTML = "Feedback inserito";
                document.getElementById("afterFeedback").className = "alert alert-success";
        }
}

//funzione che notifica le modifiche
function displayChanges() {
        document.getElementById("changes").innerHTML = "Modifiche effettuate!";
        document.getElementById("changes").removeAttribute("hidden");
}
