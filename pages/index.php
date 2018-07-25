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
                <p class="text-left"><b>vgSWAP</b> è una piattaforma studiata appositamente per lo sharing di videogiochi nella maniera piu semplice che ci sia.
                Attraverso poche e semplici mosse è possibile cominciare a condivere tutti i giochi che avete in casa e che ora non usate piu.
                Potete inserire un gioco per averne in cambio un altro durante un arco temporale che decidete, oppure noleggiarlo, sempre durante un 
                arco temporale prefissato e ad una tariffa arbitraria all'utente.
                Essendo una piattaforma di sharing, gli accordi a seguito di una condivisione/noleggio sono da concordare tra i due utenti interessati
                tramite la chat interna della piattaforma oppure tramite email.
               </p>
            </div>
            <div class="col-md-4 border-right border-dark">
                <h2 class="text-center">PERCHE'?</h2>
                <p class="text-left">La piattaforma è pensata per tutti gli amanti dei videogames e che, allo stesso tempo, ne odiano il prezzo cosi elevato.
                Per questo abbiamo pensato, quando si finisce un gioco, oppure ci si stufa, al posto di lasciarlo sul mobile a  prendere polvere, condividerlo
                a persone che non lo hanno mai usato in cambio di un altro gioco, che, viceversa, non è mai stato provato evitando di comprarli nuovi di
                volta in volta. Quindi, è possibile inserire uno o piu videogames per averne in cambio altri, oppure noleggiarli.</p>
                
            </div>
            <div class="col-md-4 ">
                <h2 class="text-center">COME?</h2>
                <p class="text-left"> E' sufficiente registrarsi alla piattaforma e accedervi per cominciare ad utilizzarla. Una volta loggati è possibile gestire tutte le
                informazioni associate al vostro profilo nella sezione "il mio profilo", vedere tutti gli annunci inseiti attraverso la sezione "i miei annunci",
                pubblicare un annuncio per renderlo visibile a tutti gli utenti  in "pubblica annuncio" e, ovviamente, fare una ricerca cliccando direttamente sul 
                logo in alto a sinistra della barra di navigazione.</p>
                <div class="text-center">
                    <a class="btn btn-outline-elegant wow fadeInDown" data-wow-delay="0.4s" href="SignUp.php">Registrati ora</a>
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