<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link href="../bootstrap/css/mdb.min.css" rel="stylesheet">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Our CSS -->
    <link rel="stylesheet" type="text/css" href="../css/videoGameSwap.css">

    <!--essenziale per strutture responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registrazione</title>
    <style>
        body{
            background-image: url("images/joyStick.jpg");
            /* Full height */
            height: 100%; 
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        p{
            font-family: 'Orbitron', sans-serif;/*indica il font di Google per la scritta del logo nella navbar*/
            padding-top: .3125rem;
            font-size: 1.25rem;
        }

    </style>
</head>
<body>

    <div class="container" style=" height: 95%;">

    <?php
    if (!isset($_SESSION)) {
        session_start();
    }

    $err = false;
    foreach ($_POST as $key => $value){
        switch ($key){
            case "name":
                $name = trim($_POST['name']);
                if(!preg_match("/^[a-zA-Z'ìòàù]{3,40}$/", $name)){
                    $err=true;
                    echo '<p>Il nome '.$value.' non è valido!<br></p> ';
                }
                break;

            case "surname":
                $surname = trim($_POST['surname']);
                if(!preg_match("/^[a-zA-Z]{3,40}$/", $surname)){
                    $err=true;
                    echo '<p>Il cognome '.$value.' non è valido!<br> </p>';
                }
                break;

            case "city":
                $citta = trim($_POST['city']);
                if(!preg_match("/^[\w\s']{3,40}$/", $citta)){
                    $err=true;
                    echo '<p>la città '.$value.' non è valida!<br> </p>';
                }
                break;

            case "province":
                $provincia = trim($_POST['province']);
                if(!preg_match("/^[A-Z]{2,2}$/", $provincia)){
                    $err=true;
                    echo '<p>La provincia '.$value.' non è valida!</p> ';
                }
                   
                break;

            case "CAP":
                $CAP = trim($_POST['CAP']);
                if(!preg_match("/^[0-9]{5}$/", $CAP)){
                    $err=true;
                    echo '<p>Il CAP '.$value.' non è valido!<br></p> ';
                }
                break;

            case "email":
                $email = trim($_POST['email']);
                if(!preg_match("/[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$/", $email)){
                    $err=true;
                    echo '<p>L email '.$value.' non è valida!<br> </p>';
                }
                break;

            case "password":
                $password = trim($_POST['password']);
                if(!preg_match("/[\w\.\+_-]{6,40}$/", $password)){
                    $err=true;
                    echo '<p>La password '.$value.' non è valida!<br></p> ';
                }
                break;

                default:
                    $err=true;
                    echo '<p>undefined error</p>';
        }
    }

    if(!$err){
        
        //si puo fare la registrazione
        include '../db/mysql_credentials.php';
        $con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);
       
        if($con->connect_error){//Open SQL server connection
            die("connection failed: ".$con->connect_error);
        }
        //sanitizzo dati
        foreach ($_POST as $key => $value) {
            trim($value);
            $value = mysqli_real_escape_string($con,$value);
            $value = filter_var($value, FILTER_SANITIZE_STRING);
        }

        $email =$_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $citta = $_POST['city'];
        $provincia = $_POST['province'];
        $CAP = (int)$_POST['CAP'];
        
        $password=sha1($password);//hashing pw da server
        $stmt = $con->prepare("INSERT INTO utenti VALUES (?,?,?,?,?,?,?,0,0)");


        $stmt->bind_param('ssssssi',$email,$password,$name,$surname,$citta,$provincia,$CAP);
        $stmt->execute();

        if($con->affected_rows<0){
            //inserimento nel DBMS fallitto su chiave primaria (e-mail)
            //TO-DO: rimandare a SignUp.php mostrando errore
            $_SESSION["email-esistente"] = $email;
            //fai il redirect verso il register form di nuovo mandando a video il tipo di errore nell'input
            header("location: SignUp.php");
            exit;

        }else{
            //registrazione effettuata con successo, ora fai il login!
             $_SESSION['registrazione'] = true;
             header("location: index.php");
             exit;
            
        }

        $stmt->close();
        $con->close();

        

    }else{
        //metti il link per tornare alla pagina di registrazione
         echo '<a class="btn btn-outline-elegant wow fadeInDown" data-wow-delay="0.4s" href="SignUp.php">Torna alla pagina di registrazione</a>';
    }
    ?>

    </div>

    <?php
        include "footer.php";
    ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- JQuery -->
<script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../bootstrap/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../bootstrap/js/mdb.min.js"></script>
</body>
</html>