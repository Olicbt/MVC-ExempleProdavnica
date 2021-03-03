<?php
include "../classes/class_db.php";

$data = json_decode(file_get_contents("php://input"));

$table_name = $data[0]->table_name;
$pk_value = $data[0]->pk_value;

switch ($table_name){
	
	case "proizvodi":
	include "modelProizvodi.php";
	$instanceModelProizvodi = new ModelProizvodi();
	$instanceModelProizvodi->deleteProizvodi($pk_value);
	break;
	
	case "prodazba":
	include "modelProdazba.php";
	$instanceModelProdazba = new ModelProdazba();
	$instanceModelProdazba->deleteProdazba ($pk_value);
	break;
	
	case "potrosuvaci":
	include "modelPotrosuvaci.php";
	$instanceModelPotrosuvaci = new ModelPotrosuvaci ();
	$instanceModelPotrosuvaci->deletePotrosuvaci ($pk_value);
	break;
}
?>