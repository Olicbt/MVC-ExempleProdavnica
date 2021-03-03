<?php
class ModelPotrosuvaci extends DB{
	
	public function insertPotrosuvaci ($ime, $adresa, $telefon, $email){
		$table_name = "potrosuvaci";
		$column_name = "ime, adresa, telefon, email";
		$column_value = "'$ime', '$adresa', $telefon, '$email'";
		parent::insertRow($table_name,$column_name,$column_value);
	}
	
	public function selectPotrosuvaci (){
		return parent::selectRows("potrosuvaci");
	}
	
	public function deletePotrosuvaci ($pk_value){
		$table_name = "potrosuvaci";
		$condition = "potrosuvac_id=$pk_value";
		parent::deleteRow($table_name,$condition);
	}
	
}
?>