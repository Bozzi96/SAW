
<?php
session_start();

if(isset($_SESSION['target_user'])) {
        $email = $_SESSION['target_user'];      //Email dell'utente di cui si vuole visualizzare il profilo
}
else {
        $email= $_SESSION['utente']['email'];   //Email dell'utente che ha la sessione attiva
}
//Instaurazione connessione
include("../db/mysql_credentials.php");
$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

//Query che ottiene i campi del profilo
$query = "SELECT nome, cognome, email, citta, provincia, cap, feed_positivi, feed_negativi FROM utenti WHERE email=?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$res = array();
$stmt->bind_result($res[0], $res[1], $res[2], $res[3], $res[4], $res[5], $res[6], $res[7]);
$stmt->fetch();

 //Variabile necessaria per distinguere i due casi
 if (!strcmp( $_SESSION['utente']['email'], $email)) 
        $res[] = true;          //L'utente sta andando nella propria pagina del profilo
else                    
        $res[] = false;         //L'utente vuole visualizzare il profilo di un altro utente

$json_res= json_encode($res);
echo"$json_res";
$stmt->close();
$con->close();
?>