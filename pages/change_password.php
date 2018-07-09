<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Modifica password</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- Awesome font for icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="profile.php">
                    <i class="fa fa-arrow-left"></i>Torna a "Il mio profilo"</a>
            </div>
            <div class="col-align-self-center">
                <form action="../php/commit_change_password.php" method="POST">
                    <div class="form-group">
                        <label for="oldPassword">Vecchia password:</label>
                        <input id="oldPassword" name="oldPassword" type="password" placeholder="Vecchia password" onchange="verifypsw()" oninput="verifypsw()"
                            required/>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Nuova password:</label>
                        <input id="newPassword" name="newPassword" type="password" placeholder="Nuova password" oninput="verifypsw()" onchange="verifypsw()"
                            required/>
                    </div>
                    <div class="form-group">
                        <label for="repeatPassword">Ripeti password:</label>
                        <input id="repeatPassword" name="repeatPassword" type="password" placeholder="Ripeti password" oninput="verifypsw()" onchange="verifypsw()"
                            required/>
                        <span id="afterpsw"></span>
                    </div>

                    <input type="submit" class="btn btn-primary" id="submitButton" disabled="true" value="Salva la modifica della password" />
                </form>
            </div>
        </div>
    </div>

    <script src="../js/change_password.js"></script>
</body>
<?php
session_start();
//Notifica di avvenuta modifica della password
if(isset($_SESSION['returnValue']) && $_SESSION['returnValue']===1)
    echo '<div class=" container alert alert-success col align-self-center col-md-offset-3 col-md-3 "> Password modificata!</div>';
//Notifica di errore nella modifica della password
else if(isset($_SESSION['returnValue']) && $_SESSION['returnValue']===-1)
echo '<div class=" container alert alert-danger col align-self-center col-md-offset-3 col-md-3 "> Errore, password non modificata!</div>';

//unset della variabile, in modo da non visualizzare la notifica nel caso di ricaricamento della pagina
unset($_SESSION['returnValue']);
?>

</html>