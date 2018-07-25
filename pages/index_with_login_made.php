<?php
  //apriamo la sessione e controlliamo se è gia stato fatto il login
  if (!isset($_SESSION)) {
    session_start();
  }
  $isSessionSet = false;
  if(isset($_SESSION["utente"])){
      //login fatto!
    $isSessionSet = true;   //cosi cambio l'output!

    //ottenere il codice postale e citta.

  }else{
      header("location: index.php");
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
    <link rel="stylesheet" type="text/css" href="../css/profile_navbar_css.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

    <!--essenziale per strutture responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homepage</title>
  </head>

  <body>
                

    <?php
        include "navbar.php";
    ?>
    <br><br><br><br><br><br>

    <!-- Grid row -->
    
        <div class="container">
            <div class="row">
                
                    <div class="text-center">
                        <h3 class="h1-reponsive black-text text-uppercase  mb-3 wow fadeInDown" data-wow-delay="0.3s" style="font-family: 'Orbitron', sans-serif; ">
                            <strong>INSERISCI   IL  NOME  DEL  VIDEOGIOCO  E  LA  TUA  PIATTAFORMA  PER  FARE  UNA  RICERCA</strong>
                        </h3>
                        <hr class="hr-light mt-4 wow fadeInDown" data-wow-delay="0.4s">
                        <h5 class="text-uppercase mb-5 white-text wow fadeInDown" data-wow-delay="0.4s">
                            <strong></strong>
                        </h5>

                        <?php
                        if ($isSessionSet) {
                            //ulteriore check
                            include 'search_ad.php';
                        }
                        ?>
                        
                    </div>
               
            </div><br>
                        <!--Google map-->
                        <div id="map-container" class="z-depth-1" style="height: 400px;"></div>
                        
            
        </div>
        <br>
    <!-- /Grid row -->

    

<?php
    include "footer.php";
?>

    
    

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../bootstrap/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../bootstrap/js/mdb.min.js"></script>
    
    
    <!-- Optional JavaScript -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyB58OmlW7yIXR--pf3dE5djLqEVI0UqujY"></script>
   <script type="text/javascript" src="../js/google_maps.js"></script>
   
   
   
    
    
   
    
    
  
  </body>
  </html>