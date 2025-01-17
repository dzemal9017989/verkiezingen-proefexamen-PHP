<?php
// auteur: Dzemal Nikocevic
// functie: registreer stemgerechtigde

// Autoloader classes via composer
include_once('classes/Stemgerechtigde.php');

if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen"){

		$stemgerechtigde = new Stemgerechtigde();
		$stemgerechtigde->registreer($_POST);
} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stemgerechtigden PHP</title>
    <style>
        body {
            background-color: red;
            color: white;
            text-align: center;
            margin: 250px;
        }
    </style>
</head>
<body>
<form method="POST">
    <h1>Stemgerechtigden</h1>
Voornaam: <input type="text" name="naam" required><br>
Achternaam: <input type="text" name="achternaam" required><br>
Geboortedatum: <input type="date" name="geboortedatum" required><br>
Bsn-nummer: <input type="number" name="bsn-nummer" required><br><br>
<input type="submit" name="insert" value="Toevoegen">
</form>
</body>
</html>