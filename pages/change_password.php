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
    <link rel="stylesheet" type="text/css" href="../css/change_password.css">  
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

    <!--essenziale per strutture responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cambia la password</title>
    

</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <br><br><br><br><br><br>

    <div class="container">
        <!-- Card -->
        <div class="card w-50"><!--ridimensionamento della card -> la sposto sulla sinistra-->
        
            <!-- Card body -->
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        <a href="profile.php">
                        <i class="fa fa-arrow-left"></i>Il mio profilo</a>
                    </div>
                    <div class="col-align-self-center">
                    <form action="../php/commit_change_password.php" method="POST">
                        
                        <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" name="oldPassword" id="oldPassword" class="form-control" onchange="verifypsw()" oninput="verifypsw()" data-toggle="tooltip" data-placement="right" title="Inserisci la password attuale!" required>
                        <label for="oldPassword" class="font-weight-light">Vecchia password</label>
                        </div>

                        <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" name="newPassword" id="newPassword" class="form-control" onchange="verifypsw()" oninput="verifypsw()" data-toggle="tooltip" data-placement="right" title="Inserisci la nuova password.Utilizza una password sicura lunga almeno 8 caratteri. Si consiglia l'utilizzo di maiuscole e numeri." required>
                        <label for="newPassword" class="font-weight-light">Nuova password</label>
                        </div>

                        <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" name="repeatPassword" id="repeatPassword" class="form-control" onchange="verifypsw()" oninput="verifypsw()" data-toggle="tooltip" data-placement="right" title="reinserisci la nuova password" required>
                        <label for="oldPassword" class="font-weight-light">Ripeti password</label>
                        <div id="afterpsw">
                                    <?php
                                        if (!isset($_SESSION)) {
                                            session_start();
                                        }
                                        
                                        //Notifica di avvenuta modifica della password
                                        if(isset($_SESSION['returnValue']) && $_SESSION['returnValue']===1)
                                            echo '<div class="alert alert-success"> Password modificata!</div>';
                                            //Notifica di errore nella modifica della password
                                            else if(isset($_SESSION['returnValue']) && $_SESSION['returnValue']===-1)
                                            echo '<div class="alert alert-danger"> Errore, password non modificata!</div>';
                                            //unset della variabile, in modo da non visualizzare la notifica nel caso di ricaricamento della pagina
                                            unset($_SESSION['returnValue']);
                                    ?>

                        </div>
                        </div>

                        <div class="text-center py-4 mt-3">
                        <button id="submitButton" class="btn btn-outline-elegant wow fadeInDown" data-wow-delay="0.4s" disabled="true" type="submit">Salva la modifica della password"</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
            
    </div><br><br><br>

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
    <script type="text/javascript" src="../js/SignUpForm_inputControl.js"></script>
    <script src="../js/change_password.js"></script>
    <script type="text/javascript" src="../js/videoGameSwap.js"></script>
    
</body>
</html>