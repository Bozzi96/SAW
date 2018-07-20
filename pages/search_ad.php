<div class="container">
    <form action="../php/save_search_param.php" method="POST" id="search_form">
        <input type="text" name="v_name" class="form-control-lg" placeholder="Cerca un videogioco" maxlength="40">
        <select name="console" form="search_form" class="btn btn-lg btn-dark">
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
        <input type="submit" class="btn btn-lg btn-dark" value="Cerca">
    
    </form>
</div>

