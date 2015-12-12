/* --------------------------------------------------------------------------------
filename: cdmuraws_prog05.js
author: Cory Murawske, CIS 255, Fall 2015
purpose: this program creates a searchable and sortable table of Marvel Cinematic
Universe movies, using angular js
------------------------------------------------------------------------------------ */

/* -------------------------------------------------------------------------------------------
	Purpose: this file is the javascript file for cdmuraws_prog05.html
	Pre: The user has tried to load cdmuraws_prog05.html in the web browser
	Input: None
	Output: Data for the table in cdmuraws_prog05.html
	Post: The data has been used to load the table in cdmuraws_prog05.html in the web browser.
--------------------------------------------------------------------------------------------- */

/* Code mostly comes from http://hello-angularjs.appspot.com/searchtable and http://hello-angularjs.appspot.com/sorttablecolumn */
var helloApp = angular.module("helloApp", ['ngResource', 'ui.bootstrap']);

/* -------------------------------------------------------------------------------------------
	Purpose: this function defines the list for the table in cdmuraws_prog05.html
	Pre: helloApp has been defined
	Input: $scope, $http
	Output: $scope.movies
	Post: The data has been saved to $scope.movies
--------------------------------------------------------------------------------------------- */
helloApp.controller("MovieCtrl", ['$scope', '$http', function($scope, $http) {
	$scope.movies = [ {
		'name' : 'Iron Man',
		'year' : 2008,
		'phase': 'Phase 1'
	}, {
		'name' : 'The Incredible Hulk',
		'year' : 2008,
		'phase': 'Phase 1'
	}, {
		'name' : 'Iron Man 2',
		'year' : 2010,
		'phase': 'Phase 1'
	}, {
		'name' : 'Thor',
		'year' : 2011,
		'phase': 'Phase 1'
	}, {
		'name' : 'Captain America: The First Avenger',
		'year' : 2011,
		'phase': 'Phase 1'
	}, {
		'name' : 'The Avengers',
		'year' : 2012,
		'phase': 'Phase 1'
	}, {
		'name' : 'Iron Man 3',
		'year' : 2013,
		'phase': 'Phase 2'
	}, {
		'name' : 'Thor: The Dark World',
		'year' : 2013,
		'phase': 'Phase 2'
	}, {
		'name' : 'Captain America: The Winter Soldier',
		'year' : 2014,
		'phase': 'Phase 2'
	}, {
		'name' : 'Guardians Of The Galaxy',
		'year' : 2014,
		'phase': 'Phase 2'
	}, {
		'name' : 'Avengers: Age Of Ultron',
		'year' : 2015,
		'phase': 'Phase 2'
	}, {
		'name' : 'Ant-Man',
		'year' : 2015,
		'phase': 'Phase 2'
	}, {
		'name' : 'Cpatain America: Civil War',
		'year' : 2016,
		'phase': 'Phase 3'
	}, {
		'name' : 'Doctor Strange',
		'year' : 2016,
		'phase': 'Phase 3'
	}, {
		'name' : 'Guardians Of The Galaxy Vol. 2',
		'year' : 2017,
		'phase': 'Phase 3'
	}, {
		'name' : 'Spider-Man',
		'year' : 2017,
		'phase': 'Phase 3'
	}, {
		'name' : 'Thor: Ragnarok',
		'year' : 2017,
		'phase': 'Phase 3'
	}, {
		'name' : 'Black Panther',
		'year' : 2018,
		'phase': 'Phase 3'
	}, {
		'name' : 'Avengers: Infinity War Part 1',
		'year' : 2018,
		'phase': 'Phase 3'
	}, {
		'name' : 'Ant-Man And The Wasp',
		'year' : 2018,
		'phase': 'Phase 3'
	}, {
		'name' : 'Captain Marvel',
		'year' : 2019,
		'phase': 'Phase 3'
	}, {
		'name' : 'Avengers: Infinity War Part 2',
		'year' : 2019,
		'phase': 'Phase 3'
	}, {
		'name' : 'Inhumans',
		'year' : 2019,
		'phase': 'Phase 3'	
	}, ];
	
/* -------------------------------------------------------------------------------------------
	Purpose: this function adds a row to the table in cdmuraws_prog05.html
	Pre: There is data in $scope.movies
	Input: None
	Output: $scope.name, $scope.year, $scope.phase
	Post: The row has been added.
--------------------------------------------------------------------------------------------- */
	$scope.addRow = function(){		
		$scope.movies.push({ 'name':$scope.name, 'year': $scope.year, 'studio':$scope.phase });		
		$scope.name='';
		$scope.year='';
		$scope.phase='';
	};
	
/* -------------------------------------------------------------------------------------------
	Purpose: this function deletes a row from the table in cdmuraws_prog05.html
	Pre: The user has clicked remove on a row in the table
	Input: name
	Output: None
	Post: The row has been removed
--------------------------------------------------------------------------------------------- */
	$scope.removeRow = function(name){				
		var index = -1;		
		var comArr = eval( $scope.movies );
		for( var i = 0; i < comArr.length; i++ ) {
			if( comArr[i].name === name ) {
				index = i;
				break;
			}
		}
		if( index === -1 ) {
			alert( "Something has gone wrong!" );
		}
		$scope.movies.splice( index, 1 );		
	};
	
	
}]);