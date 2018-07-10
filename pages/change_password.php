<!doctype html>
<html>

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link href="../bootstrap/css/mdb.min.css" rel="stylesheet">
    <!-- Our CSS -->
    <link rel="stylesheet" type="text/css" href="../css/profile_navbar_css.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

    <!--essenziale per strutture responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cambia la password</title>
    <style>
        body{
            background-color: white;
        }
    </style>

</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <br><br><br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="profile.php">
                    <i class="fa fa-arrow-left"></i>Torna a "Il mio profilo"</a>
            </div>
            <div class="col-align-self-center">
                <form action="../php/commit_change_password.php" method="POST">
                    <div class="form-group">
                        <label for="oldPassword">Vecchia password:</label>
                        <input id="oldPassword" name="oldPassword" type="password" placeholder="Vecchia password" onchange="verifypsw()" oninput="verifypsw()"
                            required  pattern=".{8,}" data-toggle="tooltip" data-placement="right" title="Lunghezza minima: 8 caratteri"/>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Nuova password:</label>
                        <input id="newPassword" name="newPassword" type="password" placeholder="Nuova password" oninput="verifypsw()" onchange="verifypsw()"
                            required pattern=".{8,}" data-toggle="tooltip" data-placement="right" title="Lunghezza minima: 8 caratteri"/>
                    </div>
                    <div class="form-group">
                        <label for="repeatPassword">Ripeti password:</label>
                        <input id="repeatPassword" name="repeatPassword" type="password" placeholder="Ripeti password" oninput="verifypsw()" onchange="verifypsw()"
                            required pattern=".{8,}" data-toggle="tooltip" data-placement="right" title="Lunghezza minima: 8 caratteri"/>
                        <span id="afterpsw"></span>
                    </div>

                    <input type="submit" class="btn btn-primary" id="submitButton" disabled="true" value="Salva la modifica della password" />
                </form>
            </div>
        </div>
    </div>

    
     <!-- Optional JavaScript -->
    <script src="../js/change_password.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../bootstrap/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../bootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="../js/videoGameSwap.js"></script>
</body>
<?php
session_start();
//Notifica di avvenuta modifica della password
if(isset($_SESSION['returnValue']) && $_SESSION['returnValue']===1)
    echo '<div class=" container alert alert-success col align-self-center col-md-offset-3 col-md-3 "> Password modificata!</div>';
//Notifica di errore nella modifica della password
else if(isset($_SESSION['returnValue']) && $_SESSION['returnValue']===-1)
echo '<div class=" container alert alert-danger col align-self-center col-md-offset-3 col-md-3 "> Errore, password non modificata!</div>';

//unset della variabile, in modo da non visualizzare la notifica nel caso di ricaricamento della pagina
unset($_SESSION['returnValue']);
?>

</html>