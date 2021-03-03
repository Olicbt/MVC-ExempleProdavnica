<?php
include "../classes/class_db.php";

$d = array();
$table_name = $_GET["table_name"];

switch ($table_name){
	
	case "proizvodi":
	include "modelProizvodi.php";
	$instanceModelProizvodi = new ModelProizvodi();
	$results = $instanceModelProizvodi->selectProizvodi();
	foreach ($results as $row){
		$d['records'][] = array ('proizvod_id'=>$row['proizvod_id'],
		                         'imeProizvod'=>$row['imeProizvod'],
								 'opis'       =>$row['opis'],
                                 'cena'		  =>$row['cena'],						 
		                         'popust'     =>$row['popust']       );
	}
	echo json_encode($d);
	break;
	
	case "prodazba":
	include "modelProdazba.php";
	$instanceModelProdazba = new ModelProdazba();
	$results = $instanceModelProdazba->selectProdazba();
	foreach ($results as $row){
		$d['records'][] = array ('prodazba_id'   =>$row['prodazba_id'],
		                         'potrosuvac_id' =>$row['potrosuvac_id'],
								 'proizvod_id'   =>$row['proizvod_id'],
								 'kolicina'      =>$row['kolicina'],    
		                         'data'          =>$row['data'],
								 'imeProizvod'=>$row['imeProizvod'],
								 'opis'       =>$row['opis'],
                                 'cena'		  =>$row['cena'],						 
		                         'popust'     =>$row['popust'],
								 'ime'           => $row['ime'],
								 'adresa'        => $row['adresa'],
								 'telefon'       => $row['telefon'], 
		                         'email'         => $row['email']);
	}
	echo json_encode($d);
	break;
	
	case "potrosuvaci":
	include "modelPotrosuvaci.php";
	$instanceModelPotrosuvaci = new ModelPotrosuvaci();
	$results = $instanceModelPotrosuvaci->selectPotrosuvaci();
	foreach ($results as $row){
		$d['records'][] = array ('potrosuvac_id' => $row['potrosuvac_id'],
		                         'ime'           => $row['ime'],
								 'adresa'        => $row['adresa'],
								 'telefon'       => $row['telefon'], 
		                         'email'         => $row['email']       );
	}
	echo json_encode($d);
	break;
}
?>