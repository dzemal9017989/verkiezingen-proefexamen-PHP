<?php

require '../vendor/autoload.php';
include_once 'Database.php';
use VerkiezingenProefexamen\classes\Database;


class Stemgerechtigde extends Database {

    // protected static $conn = NULL;
    public string $naam;

    public string $achternaam;

    public $geboortedatum;

    public int $bsnnummer;
    

    public function registreer($lijst) {

 
    // Maak een query 
    $sql = "INSERT INTO stemgerechtigde (Naam, Achternaam, Geboortedatum, `bsn-nummer`) 
    VALUES (:naam, :achternaam, :geboortedatum, :bsnnummer)";



    // Prepare query
    $stmt = self::$conn->prepare($sql);

    // Uitvoeren
    $stmt->execute([
    ':naam'=>$lijst['naam'],
    ':achternaam'=>$lijst['achternaam'],
    ':geboortedatum'=>$lijst['geboortedatum'],
    ':bsnnummer'=>$lijst['bsn-nummer']
    ]);


    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal; 
  }

}

?>