<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Nuovo annuncio</title>
</head>
<body>
    <?php
        include '../vgSwapper/navbar.php';
    ?>
    <!-- Titolo introduttivo della pagina -->
    <br><br>
    <h1 class="display-3">Pubblica un nuovo annuncio</h1>
    <br>
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
        <br>
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
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>