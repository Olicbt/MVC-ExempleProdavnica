<?php
include "../classes/class_db.php";
$data = json_decode(file_get_contents("php://input"));


$table_name = $data[0]->table_name;

switch ($table_name){
	
	case "proizvodi":
	   include "modelProizvodi.php";
	   $instanceModelProizvodi = new ModelProizvodi();
	   $imeProizvod = $data[0]->imeProizvod;
	   $opis        = $data[0]->opis;
	   $cena        = $data[0]->cena;
	   $popust      = $data[0]->popust;
	   $instanceModelProizvodi->insertProizvodi($imeProizvod, $opis, $cena, $popust);
	   break;
	   
	case "prodazba":
	   include "modelProdazba.php";
	   $instanceModelProdazba = new ModelProdazba();
	   $potrosuvac_id = $data[0]->potrosuvac_id;
	   $proizvod_id   = $data[0]->proizvod_id;
	   $kolicina      = $data[0]->kolicina;
	   $data          = $data[0]->data;
	   $instanceModelProdazba->insertProdazba ($potrosuvac_id, $proizvod_id, $kolicina, $data);
	   break;
	   
	case "potrosuvaci":
       include "modelPotrosuvaci.php";
       $instanceModelPotrosuvaci = new ModelPotrosuvaci();
       $ime     = $data[0]->ime;
       $adresa  = $data[0]->adresa;
       $telefon	= $data[0]->telefon;
       $email   = $data[0]->email;
       $instanceModelPotrosuvaci->insertPotrosuvaci ($ime, $adresa, $telefon, $email);
       break;	   
}
?>