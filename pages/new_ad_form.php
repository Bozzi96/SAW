<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link href="../bootstrap/css/mdb.min.css" rel="stylesheet">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <!-- Our CSS -->
    <link rel="stylesheet" type="text/css" href="../css/profile_navbar_css.css">
    <link rel="stylesheet" type="text/css" href="../css/new_ad_style.css">

    <title>Nuovo annuncio</title>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <!-- Titolo introduttivo della pagina -->
    <h1 class="display-3">Pubblica un nuovo annuncio</h1>
    <br>
    <div class="container">
    <!-- Inserimento delle info relative al nuovo annuncio -->
    <form action="../php/new_ad.php" method="POST" id="ad_form">
        <label for="v_name">Videogioco</label>
        <input type="text" class="form-control" name="v_name" maxlength="40" required><br>
        <label for="console">Console</label><br>
        <select name="console" form="ad_form" required>
            <optgroup label="PlayStation">
                <option value="PS4">PS4</option>
                <option value="PS3">PS3</option>
            </optgroup>
            <optgroup label="XBOX">
                <option value="XBOX ONE">XBOX ONE</option>
                <option value="XBOX 360">XBOX 360</option>
            </optgroup>
            <optgroup label="Nintendo">
                <option value="WII U">WII U</option>
            </optgroup>
        </select>
        <br><br>
        <label for="loan_length">Durata del prestito</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="loan_length" min="1" value="1" required> <!-- TODO: i/o a seconda del numero (js function)-->
            <div class="input-group-append">
                <span class="input-group-text">giorni</span>
            </div>
        </div>
        <label for="price">Prezzo</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="price" min="0" value="1" required>
            <div class="input-group-append">
                <span class="input-group-text">€</span>
            </div>
        </div>
        <br>    
        <input type="submit" class="btn btn-primary" value="Pubblica">
    </form>
    </div>
    
    <?php include 'footer.php'; ?>

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