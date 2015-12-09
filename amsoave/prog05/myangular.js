var helloApp = angular.module("helloApp", [ 'ngRoute', 'ui.bootstrap' ]);

helloApp.config(function($routeProvider) {
	$routeProvider.when('/searchtable', {
		controller : 'CompanyCtrl',
		templateUrl : 'views/searchtable.html'
	}).when('/sorttablecolumn', {
		controller : 'CompanyCtrl',
		templateUrl : 'views/sorttablecolumn.html'
	}).when('/aboutmyself', {
		controller : 'HelloCtrl',
		templateUrl : 'views/aboutme.html'
	}).otherwise({
		redirectTo : '/searchtable'
	});
});

helloApp.controller("HelloCtrl", function($scope) {
	$scope.name = "Calvin Hobbes";
	$scope.myprofile = [ {
		'name' : 'Ajitesh Shukla',
		'plusurl' : 'https://plus.google.com/103219280758106839440?rel=author',
		'twitterurl' : 'http://twitter.com/eajitesh'
	} ];
});

helloApp.controller("CompanyCtrl", [ '$scope', function($scope) {
	$scope.companies = [ {
		'name' : 'Infosys Technologies',
		'employees' : 125000,
		'headoffice' : 'Bangalore'
	}, {
		'name' : 'Cognizant Technologies',
		'employees' : 100000,
		'headoffice' : 'Bangalore'
	}, {
		'name' : 'Wipro',
		'employees' : 115000,
		'headoffice' : 'Bangalore'
	}, {
		'name' : 'Tata Consultancy Services (TCS)',
		'employees' : 150000,
		'headoffice' : 'Bangalore'
	}, ];
	$scope.addRow = function() {
		$scope.companies.push({
			'name' : $scope.name,
			'employees' : $scope.employees,
			'headoffice' : $scope.headoffice
		});
		$scope.name = '';
		$scope.employees = '';
		$scope.headoffice = '';
	};

	$scope.removeRow = function(name) {
		var index = -1;
		var comArr = eval($scope.companies);
		for (var i = 0; i < comArr.length; i++) {
			if (comArr[i].name === name) {
				index = i;
				break;
			}
		}
		if (index === -1) {
			alert("Something gone wrong");
		}
		$scope.companies.splice(index, 1);
	};

} ]);

helloApp.controller("HttpController", [ '$scope', '$http',
		function($scope, $http) {
			$http({
				method : 'GET',
				url : '/assets/samples/profiles.json'
			}).success(function(data, status, headers, config) {
				$scope.profiles = data;
			}).error(function(data, status, headers, config) {
				alert("failure");
			});
		} ]);