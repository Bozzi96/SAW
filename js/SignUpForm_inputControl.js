"use strict";

// Tooltips Initialization
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
})

function validate(name, value) {
    var xhttp;
    var myObj, myJSON;
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

            //verifica la risposta:
            if (myObj[0].status == 'ok') {
                var stringValid = "";
                stringValid = stringValid.fontcolor("green");
                document.getElementById(name).innerHTML = stringValid;

            } else if (myObj[0].status == 'ko') {
                var stringNotValid = " This " + name + " is not valid!";
                stringNotValid = stringNotValid.fontcolor("red");
                document.getElementById(name).innerHTML = stringNotValid;

            }
        }
    }

    //get params ready for POST request
    let param = encodeURI(name + "=" + value);
    xhttp.open("POST", "../php/checkdata.php");
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(param);
}

//funzione stringCompare
function strcmp(str1, str2) {
    return ((str1 == str2) ? 0 : ((str1 > str2) ? 1 : -1));
};

//la funzione va chiamata sia oninput che onchange, altrimenti cancellando il
//campo "Ripeti password" il pulsante di submit rimane attivo
function verifypsw() {

    var psw1 = document.getElementById("Password").value;
    var psw2 = document.getElementById("FormCard_passwordconfirm").value;
    var compare = strcmp(psw2,psw1);

        if (compare == 0) {//se le strinche sono uguali ...
            var string = "Le due password corrispondono!";
            var color = string.fontcolor("green");
            document.getElementById("FormCard_passwordconfirm-upperdiv").innerHTML = color;
            document.getElementById("submitButton").removeAttribute("disabled");
        }
        else {
            var string = "Le due password non corrispondono!";
            var color = string.fontcolor("red");
            document.getElementById("FormCard_passwordconfirm-upperdiv").innerHTML = color;
            document.getElementById("FormCard_passwordconfirm").innerHTML = "";
            document.getElementById("submitButton").setAttribute("disabled", "true");
        }
}
