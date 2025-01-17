<?php
namespace VerkiezingenProefexamen\classes;

include_once 'Database.php';
use VerkiezingenProefexamen\classes\Database;

class Verkiesbare extends Database {
    public string $voornaam;

    public string $achternaam;

    public string $partijID;

    // public int $bsnnummer;
    

    public function kiezen($lijst) {

 
    // Maak een query 
    $sql = "INSERT INTO verkiesbare (Voornaam, PartijID, Achternaam) 
    VALUES (:Voornaam, :PartijID, :Achternaam)";



    // Prepare query
    $stmt = self::$conn->prepare($sql);

    // Uitvoeren
    $stmt->execute([
    ':Voornaam'=>$lijst['Voornaam'],
    ':PartijID'=>$lijst['PartijID'],
    ':Achternaam'=>$lijst['Achternaam']
    ]);




    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal; 
}

/**
	 * Summary of crudKlant
	 * @return void
	 */
	public function crudVerkiesbare() : void {
		// Haal alle klant op uit de database mbv de method getKlant()
		$lijst = $this->getVerkiesbare();

		// Print een HTML tabel van de lijst	
		$this->showTable($lijst);
	}

	/**
	 * Summary of getKlant
	 * @return mixed
	 */
	public function getVerkiesbare() : array {
		// testdata
		/*$lijst = [
            ['klantId' => 1, 'klantEmail' => 'test1@example.com', 'klantNaam' => 'Test 1', 'klantWoonplaats' => 'City 1'],
            ['klantId' => 2, 'klantEmail' => 'test2@example.com', 'klantNaam' => 'Test 2', 'klantWoonplaats' => 'City 2']
            // Add more expected data as needed
        ];*/

		// Doe een query: dit is een prepare en execute in 1 zonder placeholders

		$lijst = self::$conn->query("SELECT * FROM politieke_partij")->fetchAll();
		
		return $lijst;
	}

 /**
  * Summary of getKlant
  * @param int $klantId
  * @return mixed
  */
	public function getKlant(int $klantId) : array {

		// Doe een fetch op $klantId
		
		// testdata
		$lijst = 
            ['klantId' => 1, 'klantEmail' => 'test1@example.com', 'klantNaam' => 'Test 1', 'klantWoonplaats' => 'City 1']
        ;

		return $lijst;
	}
	
	
 /**
  * Summary of showTable
  * @param mixed $lijst
  * @return void
  */
	public function showTable($lijst) : void {

		$txt = "<table>";

		// Voeg de kolomnamen boven de tabel
		$txt .= getTableHeader($lijst[0]);

		foreach($lijst as $row){
			$txt .= "<tr>";
			$txt .=  "<td>" . $row["Voornaam"] . "</td>";
            $txt .=  "<td>" . $row["PartijID"] . "</td>";
			$txt .=  "<td>" . $row["Achternaam"] . "</td>";
			/*
			$txt .=  "<td>" . $row["klantNaam"] . "</td>";
			$txt .=  "<td>" . $row["klantEmail"] . "</td>";
			$txt .=  "<td>" . $row["klantWoonplaats"] . "</td>";
			*/
			//Update
			// Wijzig knopje
        	$txt .=  "<td>";
			$txt .= " 
            <form method='post' action='update.php?PartijID=$row[PartijID]' >       
                <button name='update'>Wzg</button>	 
            </form> </td>";

			//Delete
			$txt .=  "<td>";
			$txt .= " 
            <form method='post' action='delete.php?PartijID=$row[PartijID]' >       
                <button name='verwijderen'>Verwijderen</button>	 
            </form> </td>";	
			$txt .= "</tr>";
		}
		$txt .= "</table>";
		echo $txt;
	}

	// Delete klant
 /**
  * Summary of deleteKlant
  * @param int $klantId
  * @return bool
  */
	public function deleteKlant(int $klantId) : bool {

		return true;
	
	}

	public function updateKlant($row) : bool{

		return true;
	}
	
	
	/**
	 * Summary of BepMaxKlantId
	 * @return int
	 */
	private function BepMaxPartijId() : int {
		
	// Bepaal uniek nummer
	$sql="SELECT MAX(PartijID)+1 FROM $this->partijID";
	return  (int) self::$conn->query($sql)->fetchColumn();
}
	
	
	/**
	 * Summary of insertKlant
	 * @param mixed $row
	 * @return mixed
	 */
	public function insertKlant($row){
		
		// Bepaal een unieke klantId
		$klantId = $this->BepMaxPartijId();

		// query
		
		
		// Prepare
		
		
		// Execute 'klantId'=>$klantId,
				
	}

}




?>