<?php
namespace VerkiezingenProefexamen\classes;

include_once "functions.php";
class Stem extends Database {

    public $lijst;

    public function showVotes() {


        $sql = "SELECT politieke_partij.Naam AS PartijNaam, verkiesbare.Voornaam AS VerkiesbareVoornaam, COUNT(*) AS 'aantal stemmen' FROM stem INNER JOIN stemgerechtigde ON stem.stemgerechtigdeId = stemgerechtigde.ID INNER JOIN verkiesbare ON stem.verkiesbareId = verkiesbare.ID INNER JOIN politieke_partij ON verkiesbare.PartijID = politieke_partij.PartijID GROUP BY PartijNaam";
// Mock data (later vervangen door databasegegevens)
/*$lijst = [
    ["PartijNaam" => "D66", "VerkiesbareVoornaam" => "Rob", "aantal stemmen" => 10],
    ["PartijNaam" => "VVD", "VerkiesbareVoornaam" => "Mark", "aantal stemmen" => 5]
];*/

$lijst = self::$conn->query($sql)->fetchAll();

        if (empty($lijst)) {
            echo "Geen gegevens beschikbaar om weer te geven.";
            return;
        }
    
        $txt = "<table>";
    
        // Voeg de kolomnamen boven de tabel
        $txt .= getTableHeader($lijst[0]);
    
        foreach($lijst as $row){
            $txt .= "<tr>";
            $txt .=  "<td>" . $row["PartijNaam"] . "</td>";
            $txt .=  "<td>" . $row["VerkiesbareVoornaam"] . "</td>";
            $txt .=  "<td>" . $row["aantal stemmen"] . "</td>";
            $txt .= "</tr>";
        }
        $txt .= "</table>";
        echo $txt;
    }
    
}

?>