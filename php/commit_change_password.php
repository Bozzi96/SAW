<?php

session_start();
include("../db/mysql_credentials.php");
$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$repeatPassword = $_POST['repeatPassword'];

$email= $_SESSION['utente']['email'];
//La prima query serve per ottenere la vecchia password e verificare la correttezza
$query ="SELECT psw FROM utenti WHERE 1";
$res = $con->query($query);
$oldpsw= $res->fetch_object();

//Valore di ritorno per distinguere i casi di successo o insuccesso
$returnValue=0;
//Password criptate secondo la funzione SHA1(), uso un compare CASE INSENSITIVE
if ( strcasecmp( sha1($oldPassword), $oldpsw->psw) == 0)
{
    //La vecchia password è corretta, aggiorno il valore
    $query = "UPDATE utenti SET psw=? WHERE email =?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", sha1($newPassword), $email);
    $stmt->execute();
    $returnValue=mysqli_affected_rows($con);
    $stmt->close();
}
else
{
$returnValue = -1;
}
$con->close();
//redirect verso la pagina precedente
$_SESSION['returnValue']= $returnValue;
header("location: /vgswap/pages/change_password.php");
exit();  //same as die();
?>