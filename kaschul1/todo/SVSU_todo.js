// Angular: Controls display and add/remove course list
function TodoCtrl($scope){

  $scope.todos = 
  [{prefix: 'CS',  courseNumber: '105', done: true}, 
   {prefix: 'CIS', courseNumber: '255', done: false}];
	
  $scope.getTotalTodos = function(){
    return $scope.todos.length;
	};
	
  $scope.clearCompleted = function(){
    $scope.todos = _.filter($scope.todos, function(todo){
	  return !todo.done;
	})
  };
	
  $scope.addTodo = function(){
    $scope.todos.push({prefix:$scope.formTodoPrefix, 
	courseNumber:$scope.formTodoCourseNumber, done:false});
	$scope.formTodoPrefix = "";
	$scope.formTodoCourseNumber = "";
  };
}

// javascript: looks up sections of specific prefix/courseNumber
	var xmlhttp = new XMLHttpRequest();
	function GetTargets(){
		//var pre =$("#Prefix").innerHTML;
		var pre = document.getElementById("Prefix").innerHTML;
		//var course =$("#CourseNum").val();
		var course = document.getElementById("CourseNum").innerHTML;
		var url = "https://api.svsu.edu/courses?prefix=" + pre + "&courseNumber=" + course;
		console.log(url);
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myFunction(xmlhttp.responseText);
			}
		}
		xmlhttp.open("GET", url, true);
		xmlhttp.send();

		function myFunction(response) {
			var arr = JSON.parse(response);
			var i;
			var out = "";
			console.log(arr);
			for(i = 0; i < arr.courses.length; i++) {
			out += "<tr><td>" +
			arr.courses[i].prefix +
			"&nbsp;</td><td>" +
			arr.courses[i].courseNumber +
			"&nbsp;</td><td>" +
			arr.courses[i].meetingTimes[0].startTime +
			"&nbsp;</td><td>" +
			arr.courses[i].term +
			"</td></tr>";
			}
			document.getElementById("targets").innerHTML = out;
		}
	}


