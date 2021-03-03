<?php
class ModelProdazba extends DB{
	
	public function insertProdazba ($potrosuvac_id, $proizvod_id, $kolicina, $data){
		$table_name = "prodazba";
		$column_name = "potrosuvac_id, proizvod_id, kolicina, data";
		$column_value = "$potrosuvac_id, $proizvod_id, $kolicina, '$data'";
		parent::insertRow($table_name,$column_name,$column_value);
	}
	
	public function selectProdazba (){
		return parent::selectRows("prodazba INNER JOIN proizvodi ON prodazba.proizvod_id = proizvodi.proizvod_id
		                                    INNER JOIN potrosuvaci ON prodazba.potrosuvac_id = potrosuvaci.potrosuvac_id");
	}
	
	public function deleteProdazba ($pk_value){
		$table_name = "prodazba";
		$condition = "prodazba_id=$pk_value";
		parent::deleteRow($table_name,$condition);
	}
}
?>