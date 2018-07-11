<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- Awesome font for icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--My stylesheet -->
    <link rel="stylesheet" href="/vgSwapper/css/profile.css">
    <title>Il mio profilo</title>
</head>

<body>
<div class="container col-md-5 col align-self-center">
    <form action="/vgSwapper/php/save_profile_changes.php" method="POST">

        <a href="#" onclick="modify()"><i class="fa fa-pencil"></i> Modifica profilo</a>
        <br>
        <div class="form-group">
            <label for="name">Nome:</label>
            <input id="name" name="name" type="text" value="" readonly="readonly" required/>
            <a href="#" onclick="oneChange('name')"><i class="fa fa-pencil"></i> Modifica nome</a>
        </div>
        <div class="form-group">
            <label for="surname">Cognome:</label>
            <input id="surname" name="surname" type="text" value="" readonly="readonly" required />
            <a href="#" onclick="oneChange('surname')"><i class="fa fa-pencil"></i> Modifica cognome</a>
        </div>
        <div class="form-group">
            <label for="city">Città:</label>
            <input id="city" name="city" type="text" value="" readonly="readonly" required />
            <a href="#" onclick="oneChange('city')"><i class="fa fa-pencil"></i> Modifica città</a>
        </div>
        <div class="form-group">
            <label for="province">Provincia:</label>
            <input id="province" name="province" type="text" value="" readonly="readonly" required/>
            <a href="#" onclick="oneChange('province')"><i class="fa fa-pencil"></i> Modifica provincia</a>
        </div>
        <div class="form-group">
            <label for="cap">CAP:</label>
            <input id="cap" name="cap" type="number" value="" readonly="readonly" required />
            <a href="#" onclick="oneChange('cap')"><i class="fa fa-pencil"></i> Modifica CAP</a>
        </div>

        <input type="submit" value="Salva le modifiche" />
    </form>
        <div>
            <a href="change_password.php">Modifica password</a>
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
//Notifica di avvenuta modifica del profilo
if(isset($_SESSION['num']) && $_SESSION['num']===1)
    echo '<div class=" container alert alert-success col-md-5 col align-self-center "> Modifiche effettuate!</div>';
//settaggio di un valore di default a num, in modo da non rendere visualizzabile la scritta in caso di ricaricamento della pagina
$_SESSION['num']=-9;
?>
</html>