<?php
  //apriamo la sessione e controlliamo se è gia stato fatto il login
  session_start();
  $isSessionSet = false;
  if(isset($_SESSION["utente"])){
      //login fatto!
    
    header("location: index_with_login_made.php");
  }
?>

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

    <title>Homepage</title>
  </head>

  <body>
                <!--  TO-DO: controllare avvenuta registrazione tramite sessione; -->

    <?php
        include "navbar.php";
    ?>

    <!-- Grid row -->
    <div class="bg">
        <div class="container flex-center">
            <div class="row pt-5 mt-3">
                <div class="col-md-12">
                    <div class="text-center">
                        <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-3 wow fadeInDown" data-wow-delay="0.3s">
                            <strong>IL MODO MIGLIORE PER CONDIVIDERE VIDEOGAMES</strong>
                        </h1>
                        <hr class="hr-light mt-4 wow fadeInDown" data-wow-delay="0.4s">
                        <h5 class="text-uppercase mb-5 white-text wow fadeInDown" data-wow-delay="0.4s">
                            <strong>Prova ora, non è mai stato cosi semplice.</strong>
                        </h5>

                        <a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s" href="#navbar-example2-informations">Scopri di più!</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
    <!-- /Grid row -->

    <!-- Grid row -->
    <div data-spy="scroll" data-target="#navbar-example2" class="scrollspy-example mt-4" data-offset="0">
    <div class="container" id="navbar-example2-informations"><!--ID necessario per il linking con il buttone "Learn More" -->
        <br><br><br>
        <div class="row  ">
            <div class="col-md-4 border-right border-dark">
                <h2 class="text-center">COS'E'?</h2>
                <p class="text-left">Duis ut massa mi. Quisque commodo augue vel congue venenatis. Praesent in leo magna. Vestibulum placerat metus dolor, non
                tempus quam faucibus et. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut magna
                leo, dapibus ac risus id, auctor pulvinar ligula. Ut id dictum magna. Aenean ac pulvinar neque, at fermentum turpis. Orci
                varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut est ipsum, ultrices eget ante eu, imperdiet
                sollicitudin diam. Integer ac erat eget mauris pulvinar consectetur.
               </p>
            </div>
            <div class="col-md-4 border-right border-dark">
                <h2 class="text-center">PERCHE'?</h2>
                <p class="text-left">Curabitur tincidunt sapien eros, quis consectetur leo tincidunt dapibus. Morbi molestie molestie massa, gravida iaculis massa
                varius eget. Vivamus vitae arcu a magna efficitur fringilla. Proin lacinia nunc sit amet elementum mollis. Nullam in lorem
                lacus. Fusce ullamcorper lorem eget lacus efficitur, sed elementum lacus faucibus. Pellentesque habitant morbi tristique
                senectus et netus et malesuada fames ac turpis egestas. In tincidunt et sapien rhoncus semper. Nunc et condimentum felis,
                ac elementum turpis. Etiam sollicitudin dignissim ultrices. Aenean laoreet dolor eu eleifend accumsan.</p>
                
            </div>
            <div class="col-md-4 ">
                <h2 class="text-center">COME?</h2>
                <p class="text-left"> Mauris ante eros, molestie venenatis lectus vel, imperdiet hendrerit augue. Suspendisse luctus et velit volutpat pharetra.
                Donec porttitor malesuada lorem vitae egestas. Etiam eu scelerisque purus. Phasellus sit amet ante sit amet nisi ultricies
                ullamcorper. Aliquam vel cursus tellus. Nulla in ante ac enim venenatis viverra ornare id metus.</p>
                <div class="text-center">
                    <a class="btn btn-outline-elegant wow fadeInDown" data-wow-delay="0.4s" href="SignUp.php">SignUp now</a>
                </div>
            </div>
        </div>
    </div>
    </div><br><br><br>
    <br>
    <br>
    <!-- /Grid row -->


    <div class="container"></div>

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