function TodoCtrl($scope) {
	
	$scope.todos = [
	{prefix:'CS', courseNumber:'105' done:true}, 
	{prefix:'CIS', courseNumber:'255' done:false}
	];
	
	$scope.getTotalTodos = function() {
		return $scope.todos.length;
	}
	
	$scope.clearCompleted = function() {
		$scope.todos = _.filter($scope.todos, function(todo){
			return !todo.done;
		})
	};
	
	$scope.addTodo = function() {
		$scope.todos.push({text:$scope.formTodoText, done:false});
		$scope.formTodoText = "" //clears input after it adds to list
	}
}