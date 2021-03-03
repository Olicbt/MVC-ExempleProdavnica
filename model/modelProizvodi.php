<?php
class ModelProizvodi extends DB{
	
	public function insertProizvodi($imeProizvod, $opis, $cena, $popust){
		$table_name = "proizvodi";
		$column_name = "imeProizvod, opis, cena, popust";
		$column_value = "'$imeProizvod', '$opis', $cena, $popust";
		parent::insertRow($table_name,$column_name,$column_value);
	}
	
	public function selectProizvodi(){
		return parent::selectRows("proizvodi");
	}
	
	public function deleteProizvodi($pk_value){
		$table_name = "proizvodi";
		$condition = " proizvod_id=$pk_value";
		parent::deleteRow($table_name,$condition);
	}
	
}
?>