<?php
namespace VerkiezingenProefexamen\classes;

// file: partij.php


include_once "functions.php";
class Partij extends Database{
	public $klantId;
	public $klantemail = null;
	public $klantnaam;
	public $klantwoonplaats;
	private $table_name = "politieke_partij";	

	// Methods

	public function toevoegenPartij($lijst) {
		// var_dump($lijst);

		/* bepaal de partijid
		SELECT MAX(PartijID)+1 FROM `politieke_partij`;
		*/
		// Bepaal een unieke klantId
		$partijId = $this->BepMaxPartijId();

		// Maak een query 
		$sql = "
			INSERT INTO politieke_partij (PartijID, Naam)
			VALUES (:PartijID, :Naam) 
		";
	
		// Prepare query
		$stmt = self::$conn->prepare($sql);
		// Uitvoeren
		$stmt->execute([
			':PartijID'=>$partijId,
            ':Naam'=>$lijst['naam'],
		]);
	
		
		// test of database actie is gelukt
		$retVal = ($stmt->rowCount() == 1) ? true : false ;
		return $retVal;  
	}
	
	/**
	 * Summary of crudKlant
	 * @return void
	 */
	public function crudPartij() : void {
		// Haal alle klant op uit de database mbv de method getKlant()
		$lijst = $this->getPartij();

		// Print een HTML tabel van de lijst	
		$this->showTable($lijst);
	}

	/**
	 * Summary of getKlant
	 * @return mixed
	 */
	public function getPartij() : array {
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
	
	public function dropDownPartij($row_selected = -1){
	
		// Haal alle klanten op uit de database mbv de method getKlanten()
		$lijst = $this->getPartij();
		
		echo "<label for='PartijID'>Kies een partij:</label>";
		echo "<select name='PartijID'>";
		foreach ($lijst as $row){
			if($row_selected == $row["PartijID"]){
				echo "<option value='$row[PartijID]' selected='selected'>$row[Naam]</option>\n";
			} else {
				echo "<option value='$row[PartijID]'> $row[Naam]</option>\n";
			}
		}
		echo "</select>";
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
			$txt .=  "<td>" . $row["PartijID"] . "</td>";
			$txt .=  "<td>" . $row["Naam"] . "</td>";
			/*
			$txt .=  "<td>" . $row["klantNaam"] . "</td>";
			$txt .=  "<td>" . $row["klantEmail"] . "</td>";
			$txt .=  "<td>" . $row["klantWoonplaats"] . "</td>";
			*/
			//Update
			// Wijzig knopje
        	$txt .=  "<td>";
			$txt .= " 
            <form method='post' action='update.php?klantId=$row[Naam]' >       
                <button name='update'>Wzg</button>	 
            </form> </td>";

			//Delete
			$txt .=  "<td>";
			$txt .= " 
            <form method='post' action='delete.php?klantId=$row[Naam]' >       
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
	$sql="SELECT MAX(PartijId)+1 FROM $this->table_name";
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