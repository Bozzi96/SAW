<!doctype html>
<html>
<head>
<link rel="stylesheet" href="profilo.css">
<title>Il mio profilo</title>
</head>

<body>

<form action="salva_modifiche.php" method="GET">

<input id="name"  type="text" value="yourname" readonly="readonly" />
<input id="buttonName" type="submit" value="Modifica nome" onclick="modify('name')" />
<br>
<input id="surname" type="text" value="yoursurname" readonly="readonly" />
<input id="buttonSurname" type="submit" value="Modifica cognome" onclick="modify('surname')" />
<br>
<input id="city" type="text" value="yourcity" readonly="readonly" />
<input id="buttonCity" type="submit" value="Modifica città" onclick="modify('city')" />
<br>
<input id="province" type="text" value="yourprovince" readonly="readonly" />
<input id="buttonProvince" type="submit" value="Modifica provincia" onclick="modify('province')" />
<br>
<input id="cap" type="number" value="00000" readonly="readonly" />
<input id="buttonCap" type="submit" value="Modifica CAP" onclick="modify('cap')" />
<br>

<input type="submit" value="Salva le modifiche" />
</form>

<script src="profilo.js"></script>
</body>

</html>