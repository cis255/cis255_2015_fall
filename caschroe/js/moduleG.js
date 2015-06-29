// Design: 1- Create a function that waits for documents ready
		// 2- once document is loaded the xmlhttp function is started
		// 3- the function defines the type (get) and accepts a url
		// 4- the url that was declared previous in the code is sent
		// 5- myFunction begins and parses the json response
		// 6- course prefixes are put into an array
		// 7- 10 variables for my desired courses are declared 
		// 8- I then count the occurance of each prefix
		// 9- I build the data and options to displat the prefixes 
			// and the amount of time each occurs
		// 10 - i declare and define options
		// 11- i define and declare the type of bar chart to be displayed finally

$(document).ready(function() 
{ 
	// creates an instance of XMLHttpRequest
	var xmlhttp = new XMLHttpRequest();
	//sets url to the path of the api
	var url = "https://api.svsu.edu/courses?";

	xmlhttp.onreadystatechange=function() {
		//if readystate and status are correct myFunction is called
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			myFunction(xmlhttp.responseText);
		}
	}
	//Defines the request as a get request 
	xmlhttp.open("GET", url, true);
	// Sends the request
	xmlhttp.send();

	//start of function for building a table that contains the retrieved info
	function myFunction(response) {
		//parsing response
		var arr = JSON.parse(response);
		// displays arr in the console
		console.log(arr);
		var i;
		// declares the array courses
		var courses = [];
		//loops through courses and fill the array courses with all of the prefixes		
		for(i = 0; i < arr.courses.length; i++) {
			courses.push(arr.courses[i].prefix);
		}
		// displays everything contained in the array courses in the console
		console.log(courses);
		// Declaring variables to contain the number of occurances of specific prefixes
		var cj = 0;
		var art = 0;
		var comm = 0;
		var engl = 0;
		var hist = 0;
		var soc = 0;
		var cis = 0;
		var cs = 0;
		var acct = 0;
		var econ = 0;
		// Loops through the array courses to count the number of occurances of each prefix
		for (var i = 0; i < courses.length; i++) {
			if (courses[i] === "CJ") {
				cj++;
			}
			if (courses[i] === "ART") {
				art++;
			}
			if (courses[i] === "COMM") {
				comm++;
			}
			if (courses[i] === "ENGL") {
				engl++;
			}
			if (courses[i] === "HIST") {
				hist++;
			}
			if (courses[i] === "SOC") {
				soc++;
			}
			if (courses[i] === "CS") {
				cs++;
			}
			if (courses[i] === "ACCT") {
				acct++;
			}
			if (courses[i] === "ECON") {
				econ++;
			}
			if (courses[i] === "CIS") {
				cis++;
			}
		}
		// 2D rendering context for the canvas
		var ctx = document.getElementById("myChart").getContext("2d");
		// Declares and defines the data and labels contained 
		var data = {
		labels: ["ACCT", "ART", "CIS", "CJ", "COMM", "CS","ECON", "ENGL", "HIST", "SOC"],
		datasets: [
			{
				label: "My First dataset",
				fillColor: "rgba(220,220,220,0.5)",
				strokeColor: "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data: [acct, art, cis, cj, comm, cs, econ, engl, hist, soc]
			},
		]
	};
	var options = {
		//Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
		scaleBeginAtZero : true,
	
		//Boolean - Whether grid lines are shown across the chart
		scaleShowGridLines : true,
	
		//String - Colour of the grid lines
		scaleGridLineColor : "rgba(0,0,0,.05)",
	
		//Number - Width of the grid lines
		scaleGridLineWidth : 1,
	
		//Boolean - Whether to show horizontal lines (except X axis)
		scaleShowHorizontalLines: true,
	
		//Boolean - Whether to show vertical lines (except Y axis)
		scaleShowVerticalLines: true,
	
		//Boolean - If there is a stroke on each bar
		barShowStroke : true,
	
		//Number - Pixel width of the bar stroke
		barStrokeWidth : 2,
	
		//Number - Spacing between each of the X value sets
		barValueSpacing : 5,
	
		//Number - Spacing between data sets within X values
		barDatasetSpacing : 1,
	
		//String - A legend template
		legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
	
	};
	// drawing a Polar area chart
	var myNewChart = new Chart(ctx).PolarArea(data);
	// filling the bar chart with data and options
	var myBarChart = new Chart(ctx).Bar(data, options);
		
	}//End of myFunction	
}
); 