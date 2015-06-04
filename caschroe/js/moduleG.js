	$(document).ready(function() 
    { 

	var ctx = document.getElementById("myChart").getContext("2d");
	var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            highlightFill: "rgba(151,187,205,0.75)",
            highlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
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
var myNewChart = new Chart(ctx).PolarArea(data);
var myBarChart = new Chart(ctx).Bar(data, options);
	
	
	
	
	// $("#myButton").jqxButton({ width: '120px', height: '35px', theme: 'darkblue'});
	// var xmlhttp = new XMLHttpRequest();
	// var url = "https://api.svsu.edu/courses?prefix=CIS";

	// xmlhttp.onreadystatechange=function() {
		// if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			// myFunction(xmlhttp.responseText);
		// }
	// }
	// xmlhttp.open("GET", url, true);
	// xmlhttp.send();

	// function myFunction(response) {
		// var arr = JSON.parse(response);
		// console.log(arr);
		// var i;
		// var out = "";

		// for(i = 0; i < arr.courses.length; i++) {
			// out += "<tr><td>" +
			// arr.courses[i].prefix +
			// "</td><td>" +
			// arr.courses[i].courseNumber +
			// "</td><td>" +
			// arr.courses[i].term +
			// "</td><td>"+
			// arr.courses[i].capacity +
			// "</td></tr>";
		// }

		// document.getElementById("id01").innerHTML = out;
	
        // $("#myTable").tablesorter( {sortList: [[0,0], [1,0]]} ); //[0,0], [1,0] first set second number = descend/ascending
    // } 
	}
	); 