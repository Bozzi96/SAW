<form action="../php/save_search_param.php" method="POST" id="search_form">
    <input type="text" name="v_name" maxlength="40">
    <select name="console" form="search_form">
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
    <input type="submit" class="btn btn-primary" value="Cerca">

</form>