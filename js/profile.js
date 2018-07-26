"use strict";

/**
* Funzione che rimuove la proprietà readOnly da tutti i campi del form
*/
function modify() {
        document.getElementById("name").readOnly = false;
        document.getElementById("surname").readOnly = false;
        document.getElementById("city").readOnly = false;
        document.getElementById("province").readOnly = false;
        document.getElementById("cap").readOnly = false;
};

/**
*  Funzione che rimuove la proprietà readOnly dall'elemento scelto
* @param {string} element elemento di cui si vuole rimuovere la proprietà readOnly
*/
function oneChange(element) {
        document.getElementById(element).readOnly = false;
        document.getElementById(element).focus();
};


/**
* Funzione per riempire correttamente i campi del form al caricamento della pagina
*/
window.addEventListener("load", function () {
        
        fetch("../php/select_user.php", { //Script che prende i dati dell'utente
        credentials: "same-origin" //Mantiene i dati di sessione
})
.then(response => response.json())
.then(function (user_data) {
        //Inserimento dei valori
        document.getElementById("name").value = user_data[0];
        document.getElementById("surname").value = user_data[1];
        document.getElementById("email").innerHTML = user_data[2];
        document.getElementById("city").value = user_data[3];
        document.getElementById("province").value = user_data[4];
        document.getElementById("cap").value = user_data[5];
        document.getElementById("feedPos").innerHTML = user_data[6];
        document.getElementById("feedNeg").innerHTML = user_data[7];
        
        //Calcolo affidabilità con approssimazione al primo decimale
        var trust = 0;
        if (user_data[6] != 0 || user_data[7] != 0)
        //Con almeno un feedback si può calcolare l'affidabilità
        trust = ((user_data[6] / (user_data[6] + user_data[7])) * 100).toFixed(1);
        
        document.getElementById("percentage").innerHTML = trust + "%";
        
        
        if (!user_data[8]) {
                //Se il profilo visualizzato è quello di un altro utente si modificano certi elementi della pagina
                for (var i = 0; i < 7; i++)
                document.getElementById("optional" + i).outerHTML = "";
                document.getElementById("panel-title").innerHTML = "Il profilo di " + user_data[0] + " " + user_data[1];
                var removeButton = document.getElementById("finalButton");
                removeButton.parentNode.removeChild(removeButton);
                
                
        } else {
                //Si rimuove la possibilità di inserire un feedback, se si è nella pagina del proprio profilo
                var removeFeed = document.getElementById("feedbackElements");
                removeFeed.parentNode.removeChild(removeFeed);
                var removeFeed = document.getElementById("feedbackElements");
                removeFeed.parentNode.removeChild(removeFeed);
                //Si mostrano i pulsanti di modifica dei campi
                for (var j = 0; j < 7; j++)
                document.getElementById("optional" + j).removeAttribute("hidden");
                
        }
})

});

/**
* Funzione che notifica la valutazione di un altro utente
* @param {int} returnValue valore che distingue i vari casi di inserimento di un feedback
*/
function displayFeedback(returnValue) {
        if (returnValue == -1) {
                document.getElementById("afterFeedback").innerHTML = "Non puoi valutare questo utente";
                document.getElementById("afterFeedback").className = "container text-center mt-3 alert alert-danger";
        }
        if (returnValue == 0) {
                document.getElementById("afterFeedback").innerHTML = "Il feedback inserito  è identico al precedente ";
                document.getElementById("afterFeedback").className = "container text-center mt-3 alert alert-warning";
        }
        if (returnValue == 1) {
                document.getElementById("afterFeedback").innerHTML = "Feedback aggiornato";
                document.getElementById("afterFeedback").className = "container text-center mt-3 alert alert-success";
        }
        if (returnValue == 2) {
                document.getElementById("afterFeedback").innerHTML = "Feedback inserito";
                document.getElementById("afterFeedback").className = "container text-center mt-3 alert alert-success";
        }
};

//funzione che notifica le modifiche
function displayChanges() {
        document.getElementById("changes").innerHTML = "Modifiche effettuate";
        document.getElementById("changes").removeAttribute("hidden");
}