<?php
session_start();

//Si prende il valore del feedback passato dal bottone
$mark = $_GET['mark'];

//Instaurazione connessione
require "../db/mysql_credentials.php";
$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

//Si ottengono dalla sessione le email degli utenti inerenti al feedback
$compratore = $_SESSION['utente']['email'];
$venditore = $_SESSION['target_user'];

//Si verifica se nella tabella c'è stato uno scambio tra compratore e venditore
$query = "SELECT * FROM feedback WHERE compratore = '$compratore' AND venditore = '$venditore'";

$result = $con->query($query);

//valore di ritorno per distinugere i vari casi di inserimento del feedback
$returnValue = 0;

//Se non c'è una entry si notifica l'impossibilità di effettuare un feedback
if (mysqli_num_rows($result)==0) {
    $returnValue = -1;
    $_SESSION['returnValue'] = $returnValue;
    header('location: ../pages/profile.php');
}
//Se si entra nell'else significa che c'è una entry
else {
    $row = mysqli_fetch_assoc($result);
    //Si verifica se l'utente ha già fornito un feedback
    if ($row['valutazione_fatta']) {
        //Se ha già fornito un feedback, si aggiorna il valore
        if ( ($row['tipo_feedback']==$mark) ) {
            //Il feedback inserito è uguale a quello che c'era prima
            $returnValue = 0;
            $_SESSION['returnValue']=$returnValue;
            header('location: ../pages/profile.php');
        }
        else {
            //Il feedback inserito è diverso da quello che c'era prima
            $update_feedback = "UPDATE feedback SET tipo_feedback = $mark WHERE compratore = '$compratore' AND venditore = '$venditore'";
            $result =  $con->query($update_feedback);
            //Si aggiorna la tabella dell'utente
            $update_user=null;
            if($mark) {
                $update_user = "UPDATE utenti SET feed_positivi = feed_positivi+1, feed_negativi = feed_negativi-1  WHERE  email = '$venditore'";
            }
            else {
                $update_user = "UPDATE utenti SET feed_negativi = feed_negativi+1, feed_positivi = feed_positivi-1 WHERE email = '$venditore'";
            }
            $result = $con->query($update_user);
            $returnValue = 1;
            $_SESSION['returnValue'] = $returnValue;
            header('location: ../pages/profile.php');
        }
    }
    //Se non ha ancora fornito un feedback, si inserisce il valore
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
        $returnValue = 2;
        $_SESSION['returnValue'] = $returnValue;
        header('location: ../pages/profile.php');
    }
}
$con->close();
?>
