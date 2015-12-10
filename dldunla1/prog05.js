var helloApp = angular.module("helloApp", ['ngResource', 'ui.bootstrap']);

helloApp.controller("GamesCtrl", ['$scope', '$http', function($scope, $http) {
	$scope.games = [ {
		'name' : '1080° Snowboarding',
		'year' : 1998,
		'players' : '2'
	}, {
		'name' : 'Animal Crossing',
		'year' : 2001,
		'players' : '1'
	}, {
		'name' : 'All-Star Baseball',
		'year' : 2000,
		'players' : '4'
	}, {
		'name' : 'Crusn USA',
		'year' : 1996,
		'players' : '2'
	}, {
		'name' : 'Disney Tarzan',
		'year' : 2000,
		'players' : '1'
	}, {
		'name' : 'Donkey Kong 64',
		'year' : 1999,
		'players' : '4'
	}, {
		'name' : 'Doom 64',
		'year' : 1997,
		'players' : '1'
	}, {
		'name' : 'Earthworm Jim 3D',
		'year' : 1999,
		'players' : '1'
	}, {
		'name' : 'Duke Nukem 64',
		'year' : 1997,
		'players' : '4'
	}, {
		'name' : 'Fighting Force 64',
		'year' : 1999,
		'players' : '2'
	}, {
		'name' : 'GoldenEye 007',
		'year' : 1997,
		'players' : '4'
	}, 
	{
		'name' : 'Super Mario 64',
		'year' : 1996,
		'players' : '1'
	}, {
		'name' : 'Super Smash Bros.',
		'year' : 1999,
		'players' : '4'
	}, {
		'name' : 'Tony Hawk  Pro Skater',
		'year' : 2000,
		'players' : '2'
	}, ];
	

	$scope.addRow = function(){		
		$scope.games.push({ 'name':$scope.name, 'year': $scope.year, 'players':$scope.players });		
		$scope.name='';
		$scope.year='';
		$scope.players='';
	};
	
	$scope.removeRow = function(name){				
		var index = -1;		
		var comArr = eval( $scope.games );
		for( var i = 0; i < comArr.length; i++ ) {
			if( comArr[i].name === name ) {
				index = i;
				break;
			}
		}
		if( index === -1 ) {
			alert( "Something gone wrong" );
		}
		$scope.games.splice( index, 1 );		
	};
	
	
}]);