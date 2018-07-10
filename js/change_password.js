"use strict";

// Tooltips Initialization
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

//funzione stringCompare
function strcmp(str1, str2) {
    return ((str1 == str2) ? 0 : ((str1 > str2) ? 1 : -1));
};

//la funzione va chiamata sia oninput che onchange, altrimenti cancellando il
//campo "Ripeti password" il pulsante di submit rimane attivo
function verifypsw() {
    var oldpsw = document.getElementById("oldPassword").value;
    var psw1 = document.getElementById("newPassword").value;
    var psw2 = document.getElementById("repeatPassword").value;

    //comparazione delle due password
    var compare = strcmp(psw1, psw2);
    if (document.getElementById("repeatPassword").value != "" && document.getElementById("newPassword").value != "") {
        if (compare == 0) {
            var string = "Le due password corrispondono!";
            var color = string.fontcolor("green");
            document.getElementById("afterpsw").innerHTML = color;
            document.getElementById("submitButton").removeAttribute("disabled");
        }
        else {
            var string = "Le due password non corrispondono!";
            var color = string.fontcolor("red");
            document.getElementById("afterpsw").innerHTML = color;
            document.getElementById("submitButton").setAttribute("disabled", "true");
        }
    }
    else {
        document.getElementById("afterpsw").innerHTML = "";
        document.getElementById("submitButton").setAttribute("disabled", "true");
    }

    //comparazione tra la password vecchia e quella nuova
    var compareOld = strcmp(oldpsw, psw1);
    if (compareOld == 0 && document.getElementById("oldPassword").value != "") {
        var string = "Non scegliere una password identica alla precedente!";
        var color = string.fontcolor("red");
        document.getElementById("afterpsw").innerHTML = color;
        document.getElementById("submitButton").setAttribute("disabled", "true");
    }

};