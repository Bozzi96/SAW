<!doctype html>
<html lang="en">

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
    <link rel="stylesheet" type="text/css" href="../css/videoGameSwap.css">
    <link rel="stylesheet" type="text/css" href="../css/SignUp.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

    <!--essenziale per strutture responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registrazione</title>
</head>
<body>
                <!--  TO-DO: controllare fallimento della registrazione tramite sessione; -->

    <div class="container">

             <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (isset($_SESSION["email-esistente"])) {
                    echo '<div class="alert alert-danger" role="alert"> Esiste gia un account con la mail: '.$_SESSION["email-esistente"].'!</div>';
                    unset($_SESSION["email-esistente"]);
                }
                
            ?>

        <br>
        <!-- Card -->
        <div class="card w-50 border border-dark"><!--ridimensionamento della card -> la sposto sulla sinistra-->
        
            <!-- Card body -->
            <div class="card-body">
        
                <!--Form register -->
                <form method="POST" name="SignUpForm" action="checkdata_submitting.php" >
                    <p class="h4 text-center py-4" style="font-family: 'Orbitron', sans-serif">COMPILA I CAMPI PER REGISTRARTI</p>


                    <div class="row"><!--GRID ROW -->
                        <div class="col">
                                <!--input text -->
                                <div id="name" class="text-right"></div>
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" name="name" class="form-control" autocomplete="on" onchange="validate(this.name,this.value)"  required>
                                    <label for="name" class="font-weight-light">Nome</label>
                                </div>
                                 
                        </div>
                        <div class="col">
                                    <!--input text -->
                                    <div id="surname" class="text-right"></div>
                                    <div class="md-form">
                                         <i class="fa fa-user prefix grey-text"></i>
                                         <input type="text" name="surname" class="form-control" autocomplete="on" onchange="validate(this.name,this.value)"  required>
                                         <label for="surname" class="font-weight-light">Cognome</label>
                                    </div>
                        </div>
                    </div>  <!--/GRID ROW -->

                    <!--input text -->
                    <div id="city" class="text-right"></div>
                    <div class="md-form">
                        <i class="fa fa-home prefix grey-text"></i>
                        <input type="text" name="city" class="form-control"autocomplete="on" onchange="validate(this.name,this.value)" required>
                        <label for="city" class="font-weight-light">Città</label>
                    </div>

                    
                    <div class="row"><!--GRID ROW -->
                        <div class="col">
                                <!--input text -->
                                <div id="province" class="text-right"></div>
                                <div class="md-form">
                                    <i class="fa fa-home prefix grey-text"></i>
                                    <input type="text" name="province" class="form-control" autocomplete="on" onchange="validate(this.name,this.value)" data-toggle="tooltip" data-placement="top" title="esprimi la provincia nella forma contratta a due caratteri " required>
                                    <label for="province" class="font-weight-light">Provincia</label>
                                </div>   
                        </div>

                        <div class="col">
                                    <!--input text -->
                                    <div id="CAP" class="text-right"></div>
                                    <div class="md-form">
                                        <i class="fa fa-home prefix grey-text"></i>
                                        <input type="text" name="CAP" class="form-control"autocomplete="on" onchange="validate(this.name,this.value)" data-toggle="tooltip" data-placement="top" title="Inserisci il codice postale della tua zona." required>
                                        <label for="CAP" class="font-weight-light">CAP</label>
                                    </div>
                        </div>
                    </div>  <!--/GRID ROW -->
        
                    <!--Input email -->
                    <div id="email" class="text-right">
                    </div>
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <input type="email" name="email" class="form-control" autocomplete="on" onchange="validate(this.name,this.value)" required>
                        <label for="email" class="font-weight-light">Email</label>
                    </div>
        
                    <!--Input password -->
                    <div id="password" class="text-right"></div>
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" name="password" id="Password" class="form-control" minlength="8" onchange="validate(this.name,this.value)" data-toggle="tooltip" data-placement="right" title="Utilizza una password sicura lunga almeno 8 caratteri. Si consiglia l'utilizzo di maiuscole e numeri." required>
                        <label for="password" class="font-weight-light">Password </label>
                    </div>

                     <!--Input password_confirm -->
                    <div id="FormCard_passwordconfirm-upperdiv" class="text-right"></div>
                    <div class="md-form">
                        <i class="fa fa-exclamation-triangle prefix grey-text"></i>
                        <input type="password" id="FormCard_passwordconfirm" class="form-control" oninput="verifypsw()" required>
                        <label for="FormCard_passwordconfirm" class="font-weight-light">Conferma password</label>
                    </div><br>
                    <div class="container">
                        <p>Sei già registrato?<a href="loginForm.php">Accedi ora.</a></p>
                    </div>
        
                    <div class="text-center py-4 mt-3">
                        <button id="submitButton" class="btn btn-outline-elegant wow fadeInDown" data-wow-delay="0.4s" disabled="true" type="submit">Registrati</button>
                    </div>
                </form>
                <!--/form register -->
        
            </div>
            <!-- /Card body -->
        
        </div>
        <!-- /Card -->

    </div>

    

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

<script type="text/javascript" src="../js/videoGameSwap.js"></script>
<script type="text/javascript" src="../js/SignUpForm_inputControl.js"></script>


</body>

</html>