<!--
	Auteur: Dzemal Nikocevic
	Function: home page CRUD partij
-->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud partij</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>CRUD Partij</h1>
	<nav>
		<a href=''>Home</a><br>
		<a href='insertpartij.php'>Toevoegen nieuwe partij</a><br>
		<a href='verkiesbare.php'>Toevoegen nieuwe partijlid</a><br><br>
	</nav>
	
<?php

// Autoloader classes via composer
require '../vendor/autoload.php';

// use Bas\classes\Partij;
use VerkiezingenProefexamen\classes\Partij;

// Maak een object Klant
$partij = new Partij;

// Start CRUD
$partij->crudPartij();

?>
</body>
</html>