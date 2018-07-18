<?php
session_start();

//prendo il valore del feedback
$mark= $_GET['mark'];

//instauro connessione
require "../db/mysql_credentials.php";
$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

//ottengo le email degli utenti inerenti al feedback
$compratore = $_SESSION['utente']['email'];
$venditore = $_SESSION['target_user'];

//verifico se nella tabella c'è stato uno scambio tra compratore e venditore
$query = "SELECT * FROM feedback WHERE compratore = '$compratore' AND venditore = '$venditore'";

$result = $con->query($query);

//valore di ritorno per distinugere i vari casi di inserimento del feedback
$returnValue=0;

//se non c'è una entry notifico l'impossibilità di effettuare un feedback
if (mysqli_num_rows($result)==0) {
    $returnValue=-1;
    $_SESSION['returnValue']=$returnValue;
    header('location: ../pages/profile.php');
}
//se entro nell'else significa che c'è una entry
else {
    $row = mysqli_fetch_assoc($result);
    //verifico se l'utente ha già fornito un feedback
    if($row['valutazione_fatta']) {
        //se ha già fornito un feedback, aggiorno il valore
        if( ($row['tipo_feedback']==$mark) ) {
            //feedback inserito uguale a quello che c'era prima
            $returnValue=0;
            $_SESSION['returnValue']=$returnValue;
            header('location: ../pages/profile.php');
        }
        else {
            //cambio di feedback
            $update_feedback = "UPDATE feedback SET tipo_feedback = $mark WHERE compratore = '$compratore' AND venditore = '$venditore'";
            $result =  $con->query($update_feedback);
            //aggiorno la tabella dell'utente
            $update_user=null;
            if($mark) {
                $update_user = "UPDATE utenti SET feed_positivi = feed_positivi+1, feed_negativi = feed_negativi-1  WHERE  email = '$venditore'";
            }
            else {
                $update_user = "UPDATE utenti SET feed_negativi = feed_negativi+1, feed_positivi = feed_positivi-1 WHERE email = '$venditore'";
            }
            $result = $con->query($update_user);
            $returnValue=1;
            $_SESSION['returnValue']=$returnValue;
            header('location: ../pages/profile.php');
        }
    }
    //se non ha ancora fornito un feedback, inserisco il valore
    else {
        $update_feedback = "UPDATE feedback SET valutazione_fatta=1, tipo_feedback = $mark WHERE compratore = '$compratore' AND venditore = '$venditore'";
        $result =  $con->query($update_feedback);
        //aggiorno la tabella utente
        $update_user=null;
        if($mark) {
            $update_user = "UPDATE utenti SET feed_positivi = feed_positivi+1 WHERE  email = '$venditore'";
        }
        else {
            $update_user = "UPDATE utenti SET feed_negativi = feed_negativi+1 WHERE email = '$venditore'";
        }
        $result = $con->query($update_user);
        $returnValue=2;
        $_SESSION['returnValue']=$returnValue;
        header('location: ../pages/profile.php');
    }
}
$con->close();
?>
