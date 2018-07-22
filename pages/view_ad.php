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
    <link rel="stylesheet" type="text/css" href="../css/view_ad.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">


    <title></title>
    <!-- Ci sarà l'inflate del titolo dell'annuncio -->
</head>

<body>
    <?php include 'navbar.php'; ?>
    <!-- Info dell'annuncio riportate qui -->
    <div class="container" id="ad_card_wrapper">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title" id="ad_title"></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Parte sinitra: annuncio -->
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold">Console</div>
                            <div class="col-sm-5" id="console"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold">Durata</div>
                            <div class="col-sm-5" id="loan_length"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold">Prezzo</div>
                            <div class="col-sm-5" id="price"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="container">
                                <!--Google map-->
                                <div id="map-container" class="z-depth-1" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Parte destra: proprietario -->
                    <div class="col-sm-3">
                        <br>
                        <div class="card" style="width: auto">
                            <img class="card-img-top" id="profile_img" src="" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title" id="ad_owner"></h4>
                                <p class="card-text" id="location"></p>
                                <a href="profile.php" class="btn btn-primary">Visualizza profilo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <!-- Chat sotto le info dell'annuncio -->
                <div class="row container" id="chat_container">
                    <div class="container" id="messages_container">

                    </div>
                    <div class="input-group">
                        <input type="text" id="message" maxlength="200" class="form-control" placeholder="Scrivi un messaggio">
                        <div class="input-group-append">
                            <button class="btn btn-success btn-sm" type="button" onclick="send_message(current_ad);">Invia</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Template HTML per il messaggio all'interno della chat -->
    <template id="message_template">
        <div class="message_container">
            <p class="message_sender">Nico</p>
            <span class="message_text">Messaggio di prova</span>
            <p class="message_time">11:00</p>
        </div>
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
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyB58OmlW7yIXR--pf3dE5djLqEVI0UqujY"></script>
    <script src="../js/localization.js"></script>
    <script src="../js/view_ad.js"></script>
</body>

</html>