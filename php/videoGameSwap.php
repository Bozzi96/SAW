<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Our CSS -->
    <link rel="stylesheet" type="text/css" href="videoGameSwap.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

    <!--essenziale per strutture responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>il nostro sito</title>
  </head>

  <body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
            <i class="fa fa-gamepad" aria-hidden="true"></i>
                <strong> vgSWAP</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="float-right"><!--floating right navbar elements-->
                <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login
                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="SignUp.html">Sign Up
                                <i class="fa fa-level-up" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Help
                                <i class="fa fa-question" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
    </nav>
    <!--/navbar-->

    <!-- Grid row -->
    <div class="bg">
        <div class="container flex-center">
            <div class="row pt-5 mt-3">
                <div class="col-md-12">
                    <div class="text-center">
                        <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-3 wow fadeInDown" data-wow-delay="0.3s">
                            <strong>THE BEST WAY FOR SWAPPING VIDEOGAMES</strong>
                        </h1>
                        <hr class="hr-light mt-4 wow fadeInDown" data-wow-delay="0.4s">
                        <h5 class="text-uppercase mb-5 white-text wow fadeInDown" data-wow-delay="0.4s">
                            <strong>swapping videogames has never been so easy.</strong>
                        </h5>
                        
                        <a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s" href="#navbar-example2-informations">Learn more</a>
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
                <h2 class="text-center">WHAT?</h2>
                <p class="text-left">Duis ut massa mi. Quisque commodo augue vel congue venenatis. Praesent in leo magna. Vestibulum placerat metus dolor, non
                tempus quam faucibus et. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut magna
                leo, dapibus ac risus id, auctor pulvinar ligula. Ut id dictum magna. Aenean ac pulvinar neque, at fermentum turpis. Orci
                varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut est ipsum, ultrices eget ante eu, imperdiet
                sollicitudin diam. Integer ac erat eget mauris pulvinar consectetur.
               </p>
            </div>
            <div class="col-md-4 border-right border-dark">
                <h2 class="text-center">WHY?</h2>
                <p class="text-left">Curabitur tincidunt sapien eros, quis consectetur leo tincidunt dapibus. Morbi molestie molestie massa, gravida iaculis massa
                varius eget. Vivamus vitae arcu a magna efficitur fringilla. Proin lacinia nunc sit amet elementum mollis. Nullam in lorem
                lacus. Fusce ullamcorper lorem eget lacus efficitur, sed elementum lacus faucibus. Pellentesque habitant morbi tristique
                senectus et netus et malesuada fames ac turpis egestas. In tincidunt et sapien rhoncus semper. Nunc et condimentum felis,
                ac elementum turpis. Etiam sollicitudin dignissim ultrices. Aenean laoreet dolor eu eleifend accumsan.</p>
                
            </div>
            <div class="col-md-4 ">
                <h2 class="text-center">HOW?</h2>
                <p class="text-left"> Mauris ante eros, molestie venenatis lectus vel, imperdiet hendrerit augue. Suspendisse luctus et velit volutpat pharetra.
                Donec porttitor malesuada lorem vitae egestas. Etiam eu scelerisque purus. Phasellus sit amet ante sit amet nisi ultricies
                ullamcorper. Aliquam vel cursus tellus. Nulla in ante ac enim venenatis viverra ornare id metus.</p>
                <div class="text-center">
                    <a class="btn btn-outline-elegant wow fadeInDown" data-wow-delay="0.4s">SignUp now</a>
                </div>
            </div>
        </div>
    </div>
    </div><br><br><br>
    <br>
    <br>
    <!-- /Grid row -->


    <div class="container">
    </div>


<!--Footer-->
<?php
include("footer.php");
?>
<!--/.Footer-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript" src="videoGameSwap.js"></script>


  </body>
  </html>