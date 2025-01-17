<?php



// file: insertparij.php
// map: verkiezingen proefexamen

// Autoloader classes via composer
require '../vendor/autoload.php';

use VerkiezingenProefexamen\classes\Partij;


// var_dump($_POST);


if (isset($_POST["insert-btn"]) && isset($_POST["naam"])) {

    // Code insert klant


    $partij = new Partij();
    $partij->toevoegenPartij($_POST);
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            background-color: lightgreen;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /*input[type="submit"].solid {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50%; /* Maakt de knop rond 
            cursor: pointer;
        }*/

        input[type="submit"].solid:hover {
            background-color: darkgreen;
        }

        input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <h1>Partij toevoegen</h1>

    <form action="insertpartij.php" method="POST">
        Naam: <input type="text" name="naam"><br><br>
        <input type="submit" name="insert-btn" value="Submit" class="solid"><br><br>
        <p><a href="homepage.html">Terug</a></p><br>
    </form>

</body>

</html>