$(document).ready(function(){
	
	// Main Function
	$(".JsonBtn").click(function(){
		//Declares variables for url
		var path = "https://api.svsu.edu/courses?"
		var department = $("#departmentInput").val();
		var course = $("#courseInput").val();
		//Builds url variable depending on what info is given
		if(department != null || ""){
			var fullPath = path + "prefix=" + department
			if(course != null || ""){
				fullPath = fullPath + "&courseNumber=" + course;
			}
		}else{
			//alerts if no info is given
			alert("Must enter department!");
		}
	
var xmlhttp = new XMLHttpRequest();
//sets url to fullpath variable
var url = 'https://api.svsu.edu/courses?';

xmlhttp.onreadystatechange=function() {
	//if readystate and status are correct myFunction is called
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        myFunction(xmlhttp.responseText);
    }
}
//Defines the request as a get request 
xmlhttp.open("GET", url, true);
xmlhttp.send();

//start of function for building a table that contains the retrieved info
function myFunction(response) {
	//parsing response
    var arr = JSON.parse(response);
    console.log(arr);
    var i;
	var out = "";
	//loops through courses and displays all associated info 
    for(i = 0; i < arr.courses.length; i++) {
        out += "<tr><td>" +
        arr.courses[i].prefix +
        "</td><td>" +
        arr.courses[i].courseNumber +
        "</td><td>" +
        arr.courses[i].term +
        "</td><td>"+
        arr.courses[i].capacity +
		"</td></tr>";
    }
	//outputs the correct info obtained from the loop to the html
    document.getElementById("id01").innerHTML = out;
	//makes the table sortable 
}//End of myFunction
})//End Main Function
 });