app.config(function($routeProvider) {
  $routeProvider
  
  .when("/", {
    templateUrl : "view/main.html",
	controller: 'myCtrl'
  })
  
  .when("/proizvodi", {
    templateUrl : "view/proizvodi.html",
	controller: 'myCtrl'
  })
  
  .when("/prodazba", {
    templateUrl : "view/prodazba.html",
	controller: 'myCtrl'
  })
  
  .when("/potrosuvaci", {
    templateUrl : "view/potrosuvaci.html",
	controller: 'myCtrl'
  })
  
  .when("/details_proizvodi", {
    templateUrl : "view/details_proizvodi.html",
	controller: 'myCtrl'
  })
  
  .when("/details_prodazba", {
    templateUrl : "view/details_prodazba.html",
	controller: 'myCtrl'
  })
  
  .when("/details_potrosuvaci", {
    templateUrl : "view/details_potrosuvaci.html",
	controller: 'myCtrl'
  })
  
  .otherwise("/", {
    templateUrl : "view/index.html",
	controller: 'myCtrl'
  })
  
});