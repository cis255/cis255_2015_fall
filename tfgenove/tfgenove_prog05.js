/* --------------------------------------------------------------------------------
filename: tfgenove_prog05.js
author: Tessa Genovese, CIS 255, Fall 2015
purpose: this program creates a searchable and sortable table of Fred Astaire's
		 movie musicals, using angular js
------------------------------------------------------------------------------------ */

/* -------------------------------------------------------------------------------------------
	Purpose: this file is the javascript file for tfgenove_prog05.html
	Pre: The user has tried to load tfgenove_prog05.html in the web browser
	Input: None
	Output: Data for the table in tfgenove_prog05.html
	Post: The data has been used to load the table in tfgenove_prog05.html in the web browser.
--------------------------------------------------------------------------------------------- */

/* Code mostly comes from http://hello-angularjs.appspot.com/searchtable and http://hello-angularjs.appspot.com/sorttablecolumn,
with some changes by the author  */
var helloApp = angular.module("helloApp", ['ngResource', 'ui.bootstrap']);

/* -------------------------------------------------------------------------------------------
	Purpose: this function defines the list for the table in tfgenove_prog05.html
	Pre: helloApp has been defined
	Input: $scope, $http
	Output: $scope.movies
	Post: The data has been saved to $scope.movies
--------------------------------------------------------------------------------------------- */
helloApp.controller("MovieCtrl", ['$scope', '$http', function($scope, $http) {
	$scope.movies = [ {
		'name' : 'Dancing Lady',
		'year' : 1933,
		'studio' : 'MGM'
	}, {
		'name' : 'Flying Down to Rio',
		'year' : 1933,
		'studio' : 'RKO'
	}, {
		'name' : 'A Damsel in Distress',
		'year' : 1937,
		'studio' : 'RKO'
	}, {
		'name' : 'The Story of Vernon and Irene Castle',
		'year' : 1939,
		'studio' : 'RKO'
	}, {
		'name' : 'Broadway Melody of 1940',
		'year' : 1940,
		'studio' : 'MGM'
	}, {
		'name' : 'Blue Skies',
		'year' : 1946,
		'studio' : 'Paramount'
	}, {
		'name' : 'Easter Parade',
		'year' : 1948,
		'studio' : 'MGM'
	}, {
		'name' : 'Royal Wedding',
		'year' : 1951,
		'studio' : 'MGM'
	}, {
		'name' : 'Daddy Long Legs',
		'year' : 1955,
		'studio' : '20th Century Fox'
	}, {
		'name' : 'Funny Face',
		'year' : 1957,
		'studio' : 'Paramount'
	}, {
		'name' : 'Silk Stockings',
		'year' : 1957,
		'studio' : 'MGM'
	}, ];
	
/* -------------------------------------------------------------------------------------------
	Purpose: this function adds a row to the table in tfgenove_prog05.html
	Pre: There is data in $scope.movies
	Input: None
	Output: $scope.name, $scope.year, $scope.studio
	Post: The row has been added.
--------------------------------------------------------------------------------------------- */
	$scope.addRow = function(){		
		$scope.movies.push({ 'name':$scope.name, 'year': $scope.year, 'studio':$scope.studio });		
		$scope.name='';
		$scope.year='';
		$scope.studio='';
	};
	
/* -------------------------------------------------------------------------------------------
	Purpose: this function deletes a row from the table in tfgenove_prog05.html
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
			alert( "Something gone wrong" );
		}
		$scope.movies.splice( index, 1 );		
	};
	
	
}]);