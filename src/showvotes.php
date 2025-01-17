<!--
	Auteur: Dzemal Nikocevic
	Function: home page CRUD partij
-->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Stem</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>CRUD Stemmen</h1>
	<nav>
		<a href=''>Home</a><br>
		<a href='insertpartij.php'>Toevoegen nieuwe partij</a><br>
		<a href='verkiesbare.php'>Toevoegen nieuwe partijlid</a><br><br>
	</nav>
	
    <?php

require '../vendor/autoload.php';

use VerkiezingenProefexamen\classes\Stem;

// Maak een object van Stem
$stem = new Stem;



// Start CRUD
$stem->showVotes();

?>

</body>
</html>