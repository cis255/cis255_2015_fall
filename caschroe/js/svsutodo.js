// Design: 1- Function for the todo list
		// 2- sets all the courses I need and sets done to true or false
		// 3- Then a function to get total todos to display
	    // 4- Functiond for clearing completed todos from the list
		// 5-- Next a function for adding todos to the list
		// 6-- Then finally a function for taking the course prefix and number
		  // that is to be added and use an api to retreive them
		// 7- The formatting for the output of the result is also done in 
		//    this function as well
		// 8- Last a function to clear all tables on the screen

	// Function containing all todos finished and unfinished
function TodoCtrl($scope){
	// Declaration of todos
  $scope.todos = 
  [{prefix: 'CS',  courseNumber: '105', done: true}, 
   {prefix: 'CIS', courseNumber: '255', done: true},
   {prefix: 'CS', courseNumber: '245', done: false},
   {prefix: 'MATH', courseNumber: '161', done: true},
   {prefix: 'MATH', courseNumber: '223', done: false},
   {prefix: 'MATH', courseNumber: '300', done: false},
   {prefix: 'COMM', courseNumber: '105A', done: true},
   {prefix: 'ENGL', courseNumber: '304', done: false},
   {prefix: 'PHIL', courseNumber: '205A', done: false},
   {prefix: 'CS', courseNumber: '116', done: true},
   {prefix: 'CS', courseNumber: '216', done: false},
   {prefix: 'CS', courseNumber: '316', done: false},
   {prefix: 'CS', courseNumber: '331', done: false},
   {prefix: 'CS', courseNumber: '401', done: false},
   {prefix: 'CS', courseNumber: '411', done: false},
   {prefix: 'CS', courseNumber: '421', done: false},
   {prefix: 'CS', courseNumber: '446', done: false},
   {prefix: 'CS', courseNumber: '451', done: false},
   {prefix: 'CIS', courseNumber: '311', done: false},
   {prefix: 'CIS', courseNumber: '355', done: false},
   {prefix: 'CIS', courseNumber: '366', done: false},
   {prefix: 'CS', courseNumber: '403', done: false},
   {prefix: 'CS', courseNumber: '345', done: false},];
	
	// Function for getting total todos
  $scope.getTotalTodos = function(){
    return $scope.todos.length;
	};
	// Function to clear completed todos from the list
  $scope.clearCompleted = function(){
    $scope.todos = _.filter($scope.todos, function(todo){
	  return !todo.done;
	})
  };
	// Function to add todos to my list
  $scope.addTodo = function(){
    $scope.todos.push({prefix:$scope.formTodoPrefix, 
	courseNumber:$scope.formTodoCourseNumber, done:false});
	$scope.formTodoPrefix = "";
	$scope.formTodoCourseNumber = "";
  };


// javascript: looks up sections of specific prefix/courseNumber
	var xmlhttp = new XMLHttpRequest();
	$scope.GetTargets= function(prefix, courseNumber, index){
		var index = index;
		var pre = prefix;
		var course = courseNumber;
		var url = "https://api.svsu.edu/courses?prefix=" + pre + "&courseNumber=" + course;
		console.log(url);
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myFunction(xmlhttp.responseText);
			}
		}
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
// Function to format the output of the api
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
			"&nbsp;</td></tr>";
			}
			// Output into a bootstrap formatted table
			var div = document.getElementById(index);
			div.innerHTML = div.innerHTML + '<table class="table table-condensed table-bordered table-hover"><thead><th>Prefix</th><th>Course #</th><th>Start Time</th><th>Term</th></thead>'
			+ out + '</table>';
		}
	}
	// Function to hide all tables
	$("#clearBtn").on("click", function(){
		$("table").hide();
	})
}
