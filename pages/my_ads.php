<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link href="../bootstrap/css/mdb.min.css" rel="stylesheet">
    <!-- Our CSS -->
    <link rel="stylesheet" type="text/css" href="../css/profile_navbar_css.css">
    <link rel="stylesheet" type="text/css" href="../css/list_ad.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

    <title>I miei annunci</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <!-- TODO: inserire un titolo significativo -->
    <h1 id="list_title">I miei annunci</h1>

    <div class="container">
        <!-- Lista degli annunci caricata dinamicamente -->
        <ul class="list-group" id="ads_list">
        </ul>
    </div>

    <!-- Template HTML per l'annuncio dentro alla lista -->
    <template id="ad_template">
        <li class="list-group-item">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Titolo annuncio</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 font-weight-bold">Console</div>
                        <div class="col-sm-5"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 font-weight-bold">Durata</div>
                        <div class="col-sm-5"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 font-weight-bold">Prezzo</div>
                        <div class="col-sm-5"></div>
                    </div>
                    <br>
                    <button type="button" class="dettagli btn btn-primary">Dettagli</button>
                    <!-- Gruppo bottoni per rimuovere l'annuncio -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                            Rimuovi
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li class="rimuovi dropdown-item" style="cursor: pointer">Sono sicuro, rimuovi l'annuncio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>

    </template>

    <?php include 'footer.php'; ?>

    <!-- JQuery -->
    <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../bootstrap/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../bootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="../js/videoGameSwap.js"></script>
    <!-- Our JS -->
    <script src="../js/my_ads.js"></script>

</body>

</html>