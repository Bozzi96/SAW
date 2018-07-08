<?php
       session_start();

       include 'DB/mysql_credentials.php';//import credentials
       $con = new mysqli($host,$username,$psw,$database);
       
        if(mysqli_connect_errno($con)){//Open SQL server connection
            die("connection failed: ".$con->connect_error);
        }
       
       //controllo dati in arrivo e sanitizzazione
       foreach ($_POST as $key => $value) {
        if(!isset($value) || empty($value)){
            //sono arrivati campi vuoti, impossibile perche c'è 'required' nell'html ma la sicurezza non è mai troppa :) 
            $_SESSION["campi-mancanti"] = true;
            //fai il redirect verso il register form di nuovo mandando a video che i dati sono errati!
            header("location: loginForm.php");
            exit;

        }
        trim($value);
        //addslashes($value);   perchè uso quella di sotto
        $value = mysqli_real_escape_string($con,$value);
        $value = filter_var($value, FILTER_SANITIZE_STRING);
    }

    $email = $_POST["email"];
    $password = sha1($_POST["psw"]);

    $query = "SELECT * FROM utenti WHERE email='$email' AND password='$password'";

    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 1){//se la risposta contiene una tupla la query è andata abuon fine
            $_SESSION['utente'] = $row;
            mysqli_close($con);
            header("location:index.php");
            exit;
            
    }else{
         $_SESSION["login-errato"] = true;
         mysqli_close($con);
         header("location:loginForm.php");
         exit;
    }

?>