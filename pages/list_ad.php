<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Page Title</title>
</head>
<body>
    <?php include 'search_ad.php'; ?>
    <!-- TODO: inserire un titolo significativo -->
    <h1>Annunci visualizzati: tutti</h1>

    <div class="container">
        <!-- Lista degli annunci caricata dinamicamente -->
        <ul class="list-group" id="ads_list">
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="../js/fill_ad_list_element.js"></script>

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
                    <button type="button" class="btn btn-primary">Dettagli</button>
                </div>
            </div>
        </li>

    </template>
</body>
</html>