<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- Awesome font for icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--My stylesheet -->
    <link rel="stylesheet" href="/vgSwapper/css/profile.css">
    <title>Il mio profilo</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="mx-auto">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Il mio profilo</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 ">
                            <div class="row alert alert-success" id="changes" hidden ></div>
                                <form action="/vgSwapper/php/save_profile_changes.php" method="POST" id="form">
                                    <a href="#" onclick="modify()">
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
                                                            <i class="fa fa-globe"></i>
                                                            <label for="city"> <b>Città</b> </label>
                                                            <input id="city" name="city" type="text" value="" readonly="readonly" required />
                                                        </td>
                                                        <td>
                                                            <a href="#" onclick="oneChange('city')">
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
                                                            <a href="#" onclick="oneChange('province')">
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
                                                            <a href="#" onclick="oneChange('cap')">
                                                                <i class="fa fa-pencil"></i> Modifica CAP</a>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="submit" class="btn btn-primary" id="finalButton" value="Salva le modifiche" />
                                                    </td>
                                                    <td>
                                                        <a href="change_password.php">Modifica password</a>
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
    </div>



    <script src="/vgSwapper/js/profile.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
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