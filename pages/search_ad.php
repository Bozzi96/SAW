<div class="container" style="background-color: ">
    <form action="../php/save_search_param.php" method="POST" id="search_form">
        <div class="row">
            <div class="col-sm-8">
                <!-- Search form -->
                <input class="form-control" type="text" name="v_name" placeholder="Nome del videogioco" aria-label="Search">
            </div>
            <div class="col-sm-2">
                <select class="custom-select" id="inputGroupSelect01" name="console" form="search_form" required>
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

            </div>
            <div class="col-sm-2 ">
                <input type="submit" class="btn btn-outline-elegant btn-sm " value="Cerca">
            </div>
        </div>
    </form>



</div>