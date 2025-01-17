<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body {
      background-color: blue;
      color: white;
      text-align: center;
      margin: 250px;
    }
  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verkiesbare</title>
</head>
<body>
<form method="post">
  <h1>Partijlid toevoegen</h1>
  <label for="fname">Voornaam:</label><br>
  <input type="text" id="Voornaam" name="Voornaam"><br>
  <label for="lname">Achternaam:</label><br>
  <input type="text" id="Achternaam" name="Achternaam"><br>
  <?php

require '../vendor/autoload.php';
use VerkiezingenProefexamen\classes\Partij;
use VerkiezingenProefexamen\classes\Verkiesbare;

    $partij = new Partij();
    $partij->dropDownPartij();
  
  ?>
  
  
  <!---<label for="cars">Kies een partij:</label><br>
    <select name="PartijID" id="PartijID">
  <option value="pvv">PVV</option>
  <option value="pvda">PVDA</option>
  <option value="denk">Denk</option>
  <option value="partij van de dieren">Partij van de dieren</option>
    </select><br><br>---->
    <br><input type="submit" name="submit" value="submit">
</form> 

<?php



// file: insertparij.php
// map: verkiezingen proefexamen

// Autoloader classes via composer
//require '../vendor/autoload.php';
//include_once 'classes/Verkiesbare.php';
//use VerkiezingenProefexamen\classes\Partij;

if (isset($_POST['submit'])) {
    $partijlid = new Verkiesbare();
    $partijlid->kiezen($_POST);
    echo "Gegevens succesvol opgeslagen!";
}




?>
</body>
</html>