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
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
 

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

    <!--essenziale per strutture responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Il mio profilo</title>
  </head>
<body>

<?php
include "navbar.php";
?>

<br><br><br><br><br>

    <div class="container">
        <!-- Card -->
    <div class="card-deck">
        <div class="card w-50"><!--ridimensionamento della card -> la sposto sulla sinistra-->
            <!-- Card body -->
            <div class="card-body">

                <div class="text-center">
                        <h1 class="h1-reponsive black-text text-uppercase font-weight-bold mb-3 wow fadeInDown" data-wow-delay="0.3s" id="panel-title">
                            <strong>IL mio profilo</strong>
                        </h1>
                        <hr class="hr-dark mt-4 wow fadeInDown" data-wow-delay="0.4s">

                </div>
                <div class="panel-body text">
                            <div class="row alert alert-success" id="changes" hidden></div>
                                <form action="../php/save_profile_changes.php" method="POST" id="form">
                                    <div class="row">
                                            <div class="col-sm-6">
                                                    <a href="#" onclick="modify()" id="optional" data-toggle="tooltip" data-placement="top" title="Clicca qui per modificare tutti i campi che vuoi del tuo profilo!">
                                                    <i class="fa fa-pencil"></i> Modifica profilo</a>
                                            </div>
                                            <div class="col-sm-6">
                                                     <a id="optional"  href="change_password.php" data-toggle="tooltip" data-placement="top" title="Clicca qui per modificare la password" ><i class="fa fa-pencil"></i>Modifica la password</a>
                                            </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <i class="fa fa-user"></i>
                                            <label for="name"> <b>Nome</b> </label>
                                            <input id="name" name="name" type="text" value="" readonly="readonly" required/>
                                        </div>
                                        <div class="col-sm-4">
                                             <a href="#" onclick="oneChange('name')" id="optional" data-toggle="tooltip" data-placement="top" title="Clicca qui per modificare solamente il tuo nome!">
                                            <i class="fa fa-pencil"></i> Modifica nome</a>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <i class="fa fa-user"></i>
                                            <label for="surname"> <b>Cognome</b> </label>
                                            <input id="surname" name="surname" type="text" value="" readonly="readonly" required />
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="#" onclick="oneChange('surname')" id="optional" data-toggle="tooltip" data-placement="top" title="Clicca qui per modificare solamente il tuo cognome!">
                                            <i class="fa fa-pencil"></i> Modifica cognome</a>
                                        </div>
                                    </div>
                                     <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                        <i class="fa fa-globe"></i>
                                                            <label for="province"> <b>Provincia</b> </label>
                                                            <input id="province" name="province" type="text" value="" readonly="readonly" required/>
                                        </div>
                                        <div class="col-sm-4">
                                               <a href="#" onclick="oneChange('province')" id="optional" data-toggle="tooltip" data-placement="top" title="Clicca qui per modificare solamente la tua provincia!">
                                                                <i class="fa fa-pencil"></i> Modifica provincia</a>
                                        </div>
                                    </div>
                                     <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                        <i class="fa fa-user"></i>
                                        <label for="email"> <b>Email: </b> </label>
                                        <span id="email" name="email"></span>
                                        </div>
                                            
                                       
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <i class="fa fa-globe"></i>
                                            <label for="city"> <b>Città</b> </label>
                                            <input id="city" name="city" type="text" value="" readonly="readonly" required />
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="#" onclick="oneChange('city')" id="optional" data-toggle="tooltip" data-placement="top" title="Clicca qui per modificare solamente la tua citta di appartenenza">
                                            <i class="fa fa-pencil"></i> Modifica città</a>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <i class="fa fa-globe"></i>
                                                            <label for="cap"> <b>CAP</b> </label>
                                                            <input id="cap" name="cap" type="number" value="" readonly="readonly" required />
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="#" onclick="oneChange('cap')" id="optional" data-toggle="tooltip" data-placement="top" title="Clicca qui per modificare solamente il tuo codice postale!">
                                                                <i class="fa fa-pencil"></i> Modifica CAP</a>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>

                                    <div class="row">
                                        <div class="col text-center">
                                            <input type="submit" class="btn btn-outline-elegant" id="finalButton" value="Salva le modifiche" />
                                           
                                        </div>
                                    </div>
                    
                                   
                                </form>
                            </div>
                        </div><!-- /Card body -->
                    </div><!-- /Card -->

                    <!--Feedback card-->
                    <div class="card">
                        <div class="card-body">
                        <div class="text-center">
                            <h1 class="h1-reponsive black-text text-uppercase font-weight-bold mb-3 wow fadeInDown" data-wow-delay="0.3s"> <strong>Feedback </strong> </h1>
                            <hr class="hr-dark mt-4 wow fadeInDown" data-wow-delay="0.4s">
                        </div>
                        <div class="row text-center">
                                        <div class="col-sm-6 feedbackIcon">
                                            <span class="fa fa-thumbs-up text-success"></span>
                                            <h1 id="feedPos"> </h1>
                                        </div>
                                        <div class="col-sm-6 feedbackIcon">
                                        <span class="fa fa-thumbs-down text-danger"></span>
                                        <h1 id="feedNeg"></h1>
                                        </div>
                        
                        </div>
                        <hr class="hr-dark mt-4 wow fadeInDown" data-wow-delay="0.4s">
                        <div class="row text-center">
                            <div class="col-sm-12">
                            <label for="percentage"> <h2> <strong>Affidabilità</strong></h2></label>
                            <h1 id="percentage"></h1>
                            </div>
                        </div>
                        <hr class="hr-dark mt-4 wow fadeInDown" data-wow-delay="0.4s">
                        <div class="row text-center" id="feedbackElements">
                            <div class="col-sm-12">
                               <h2> <strong>Valuta utente </strong></h2>
                            </div>
                            <div class="col-sm-6">
                            <form action="../php/feedback.php?" method="GET">
                                <button class="btn btn-success btn-lg" id="positiveMark"> <span class="fa fa-thumbs-up"> </span></button>
                                <input type="hidden" name="mark" id="mark" value=1>
                                </form>
                            </div>
                            <div class="col-sm-6">
                            <form action="../php/feedback.php?" method="GET">
                                <button class=" btn btn-danger btn-lg" id="negativeMark"> <span class="fa fa-thumbs-down"></span> </button>
                                <input type="hidden" name="mark" id="mark" value=0>
                            </div>
                            <div class"container text-center" id="afterFeedback"></div>
                        </div>
                    </div> <!--/Feedback card-->
                </div>
                    
                </div>
</div>

<?php
include "footer.php";
?>

    
    <!-- Optional JavaScript -->
    <script src="../js/profile.js"></script>
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
<?php
session_start();
#variabile di sessione predefinita causa problemi
#$_SESSION['target_user']= "lollibozzi@gmail.com";

//Notifica di avvenuta modifica del profilo tramite funzione js
if(isset($_SESSION['num']) && $_SESSION['num']===1)
        echo "<script> displayChanges() </script>";    
//unset della variabile, in modo da non visualizzare la notifica nel caso di ricaricamento della pagina
unset($_SESSION['num']);

//notifica di valutazione
if(isset($_SESSION['returnValue']))
        echo "<script> displayFeedback(" .$_SESSION['returnValue']. ") </script>";
unset($_SESSION['returnValue']);

?>


</html>
