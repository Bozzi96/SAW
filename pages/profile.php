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

    <title>Il mio profilo</title>
  </head>
<body>

<?php
include "navbar.php";
?>

<br>
<br><br><br><br>

    <div class="container">

        <!-- Card -->
        <div class="card w-50"><!--ridimensionamento della card -> la sposto sulla sinistra-->
        
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                 <div class="mx-auto">
                    <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="panel-title">Il mio profilo</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 ">
                            <div class="row alert alert-success" id="changes" hidden></div>
                                <form action="../php/save_profile_changes.php" method="POST" id="form">
                                    <a href="#" onclick="modify()" id="optional">
                                        <i class="fa fa-pencil"></i> Modifica profilo</a>
                                    <div class=" col-md-9 col-lg-9 ">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <i class="fa fa-user"></i>
                                                            <label for="name"> <b>Nome</b> </label>
                                                            <input id="name" name="name" type="text" value="" readonly="readonly" required/>
                                                        </td>
                                                        <td>
                                                            <a href="#" onclick="oneChange('name')" id="optional">
                                                                <i class="fa fa-pencil"></i> Modifica nome</a>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">

                                                        <td>
                                                            <i class="fa fa-user"></i>
                                                            <label for="surname"> <b>Cognome</b> </label>
                                                            <input id="surname" name="surname" type="text" value="" readonly="readonly" required />
                                                        </td>
                                                        <td>
                                                            <a href="#" onclick="oneChange('surname')" id="optional">
                                                                <i class="fa fa-pencil"></i> Modifica cognome</a>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <i class="fa fa-user"></i>
                                                            <label for="email"> <b>Email</b> </label>
                                                            <div id="email" name="email"></div>
                                                        </td>
                                                        <td>
                                                        
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <i class="fa fa-globe"></i>
                                                            <label for="city"> <b>Città</b> </label>
                                                            <input id="city" name="city" type="text" value="" readonly="readonly" required />
                                                        </td>
                                                        <td>
                                                            <a href="#" onclick="oneChange('city')" id="optional">
                                                                <i class="fa fa-pencil"></i> Modifica città</a>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <i class="fa fa-globe"></i>
                                                            <label for="province"> <b>Provincia</b> </label>
                                                            <input id="province" name="province" type="text" value="" readonly="readonly" required/>
                                                        </td>
                                                        <td>
                                                            <a href="#" onclick="oneChange('province')" id="optional">
                                                                <i class="fa fa-pencil"></i> Modifica provincia</a>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <i class="fa fa-globe"></i>
                                                            <label for="cap"> <b>CAP</b> </label>
                                                            <input id="cap" name="cap" type="number" value="" readonly="readonly" required />
                                                        </td>
                                                        <td>
                                                            <a href="#" onclick="oneChange('cap')" id="optional">
                                                                <i class="fa fa-pencil"></i> Modifica CAP</a>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="submit" class="btn btn-primary" id="finalButton" value="Salva le modifiche" />
                                                    </td>
                                                    <td>
                                                        <a href="change_password.php" id="optional">Modifica password</a>
                                                    </td>
                                                </tr>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div><!-- /Card body -->
    </div><!-- /Card -->
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
</body>
<?php
session_start();
//Notifica di avvenuta modifica del profilo tramite funzione js
if(isset($_SESSION['num']) && $_SESSION['num']===1)
        echo "<script> displayChanges() </script>";    
//unset della variabile, in modo da non visualizzare la notifica nel caso di ricaricamento della pagina
unset($_SESSION['num']);
?>


</html>