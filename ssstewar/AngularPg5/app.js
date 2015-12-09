// app.js
angular.module('sortApp', [])

.controller('mainController', function($scope) {
  $scope.sortType     = 'player'; // set the default sort type
  $scope.sortReverse  = false;  // set the default sort order
  $scope.searchplayer   = '';     // set the default search/filter term
  
  // create the list of Pistons starters 
  $scope.Pistons = [
    { player: 'Reggie Jackson', position: 'Point Guard', rating: 8.5 },
    { player: 'Kentavious Caldwell-Pope', position: 'Shooting Guard', rating: 7.5 },
    { player: 'Marcus Morris', position: 'Small Forward', rating: 8 },
    { player: 'Ersan Ilyasova', position: 'Power Forward', rating: 7 },
	{ player: 'Andre Drummond', position: 'Center', rating: 9 }
  ];
  
  $scope.addRow = function(){		
	$scope.Pistons.push({ 'player':$scope.player, 'position': $scope.position, 'rating':$scope.rating });
	$scope.player='';
	$scope.position='';
	$scope.rating='';
  };

  $scope.removeRow = function(player){				
		var index = -1;		
		var comArr = eval( $scope.Pistons );
		for( var i = 0; i < comArr.length; i++ ) {
			if( comArr[i].player === player ) {
				index = i;
				break;
			}
		}
		/* if( index === -1 ) {
			alert( "Something gone wrong" );
		} */
		$scope.Pistons.splice( index, 1 );		
	};
});