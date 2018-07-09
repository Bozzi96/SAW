
<?php
session_start();
        //$_SESSION['target_user']= "alessandro.bozzi@gmail.com"; si aspetta la variabile di sessione di Nico
        //$email= "alessandro.bozzi@gmail.com"; email predefinita
        if(isset($_SESSION['target_user'])) {
                $email = $_SESSION['target_user'];      //email dell'utente di cui si vuole visualizzare il profilo
        }
        else {
                $email= $_SESSION['utente']['email'];   //email dell'utente che ha la sessione attiva
        }
        include("../db/mysql_credentials.php");
        $con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);
        $query = "SELECT nome, cognome, email, citta, provincia, cap FROM utenti WHERE email=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        //Ottengo il risultato dalla query
        $res = array();
        $stmt->bind_result($res[0], $res[1], $res[2], $res[3], $res[4], $res[5]);
        $stmt->fetch();
         //variabile necessaria per distinguere i due casi
        if (!strcmp( $_SESSION['utente']['email'], $email)) //l'utente sta andando nella propria pagina del profilo
                $res[] = true;
        else                    //l'utente vuole visualizzare il profilo di un altro utente
                $res[] = false;

        //Lo rendo un oggetto json
        $json_res= json_encode($res);

        //Response text
        echo"$json_res";

        $stmt->close();
        $con->close();
        


?>