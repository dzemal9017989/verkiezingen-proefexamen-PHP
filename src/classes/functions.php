<?php
// auteur: Dzemal Nikocevic
// functie: algemene functies 
// file: functions.php

use VerkiezingenProefexamen\classes;

function getTableHeader(array $row) : string {
    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($row);
    $headerTxt = "<tr>";
    foreach($headers as $header){
        $headerTxt .= "<th>" . $header . "</th>";   
    }
    $headerTxt .= "</tr>";
    return $headerTxt;
}
?>