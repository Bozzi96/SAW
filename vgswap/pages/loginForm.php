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
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

    <!--essenziale per strutture responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
    <style>
        body{
            background-image: url("../images/foto_ps4.jpg");
            /* Full height */
            height: 100%; 
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>

    <div class="container">

             <?php
                session_start();
                if (isset($_SESSION["login-errato"])) {
                    echo '<div class="alert alert-danger" role="alert"> Credenziali sbagliate!</div>';
                    unset($_SESSION["login-errato"]);
                }

                if (isset($_SESSION["campi-mancanti"])) {
                    echo '<div class="alert alert-danger" role="alert"> Tutti i campi sono OBBLIGATORI!</div>';
                    unset($_SESSION["campi-mancanti"]);
                }
                
                
            ?>

        <br>
        <!-- Card -->
        <div class="card w-50 "><!--ridimensionamento della card -> la sposto sulla sinistra-->
        
            <!-- Card body -->
            <div class="card-body">
        
                <!--Form register -->
                <form method="POST" name="LoginForm" action="../php/login.php" >
                    <p class="h4 text-center py-4" style="font-family: 'Orbitron', sans-serif">EFFETTUA IL LOGIN</p>
                    
                    <!--Input email -->
                    
                    
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <input type="email" name="email" id="email" class="form-control" autocomplete="on" required>
                        <label for="email" class="font-weight-light">Email</label>
                    </div>
        
                    <!--Input password -->
                    
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" name="psw" id="psw" class="form-control" required>
                        <label for="password" class="font-weight-light">Password </label>
                    </div>
        
                    <div class="text-center py-4 mt-3">
                        <button id="submitButton" class="btn btn-outline-elegant wow fadeInDown" data-wow-delay="0.4s" type="submit">Accedi</button>
                    </div>
                </form>
                <!--/form register -->
        
            </div>
            <!-- /Card body -->
        
        </div><br><br><br><br><br><br><br><br>
        <!-- /Card -->

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

<script type="text/javascript" src="../js/videoGameSwap.js"></script>


</body>

</html>