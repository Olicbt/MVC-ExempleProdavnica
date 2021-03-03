var app = angular.module('myApp', ["ngRoute"]);

app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {




//*******************************//
//       JSON                    //
//*******************************//

//table_name:proizvodi

/*$scope.proizvodi=[
{"proizvod_id":1,"imeProizvod":"Telefon","opis":"Huawei Y","cena":5000,"popust":500},
{"proizvod_id":2,"imeProizvod":"Televizor","opis":"Philips UHD","cena":30000,"popust":1000}
];
*/

// SELECT

$scope.proizvodi=[];
$http.get("model/select.php?table_name=proizvodi")
.then(function (response){$scope.proizvodi = response.data.records;});

//table_name:potrosuvaci

$scope.potrosuvaci=[];
$http.get("model/select.php?table_name=potrosuvaci")
.then(function (response){$scope.potrosuvaci = response.data.records;});

//table_name:prodazba

$scope.prodazba=[];
$http.get("model/select.php?table_name=prodazba")
.then(function (response){$scope.prodazba = response.data.records;});


// INSERT


function postData(dataJSON){
	$http(
	{
		method: "post",
		url: 'model/insert.php',
		data: dataJSON,
		headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	}).then(function mySuccess(response) {
	//alert("Success");
	window.location.reload();
	$scope.success=true;
	});
}


$scope.details_proizvodi_fun = function (imeProizvod, opis, cena, popust){
	alert(imeProizvod+" "+opis+" "+cena+" "+popust);
	$scope.proizvodiJson=[
	{"imeProizvod":imeProizvod, "opis":opis, "cena":cena, "popust":popust, "table_name":"proizvodi"}
	];
	postData($scope.proizvodiJson);
	$scope.success=true;
}

$scope.details_prodazba_fun = function (potrosuvac_id, proizvod_id, kolicina, data){
	alert(potrosuvac_id+" "+proizvod_id+" "+kolicina+" "+data);
	$scope.prodazbaJson=[
	{"potrosuvac_id":potrosuvac_id, "proizvod_id":proizvod_id, "kolicina":kolicina, "data":data, "table_name":"prodazba"}
	];
	postData($scope.prodazbaJson);
	$scope.success=true;
}

$scope.details_potrosuvaci_fun = function (ime,adresa,telefon,email){
	alert(ime+" "+adresa+" "+telefon+" "+email);
	$scope.potrosuvaciJson=[
	{"ime":ime, "adresa":adresa, "telefon":telefon, "email":email, "table_name":"potrosuvaci"}
	];
	postData($scope.potrosuvaciJson);
	$scope.success=true;
}

// DELETE


$scope.deleteRow =function(table_name,pk_value){
	
	$scope.deleteJSON=[{"table_name":table_name,"pk_value":pk_value}]
	$http(
	{
		method: "post",
		url: 'model/delete.php',
		data: $scope.deleteJSON,
		headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	}).then(function mySuccess(response) {
	//alert("Success");
	window.location.reload();
	$scope.success=true;
	});
}



}
]);