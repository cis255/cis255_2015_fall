// Ryan Moormann
// CIS 255
// Chart Program
// This script creates a table of the number of class prefixes
// from svsu.edu/courses and creates a header with the counts
// for the ART, CIS, and ENGL prefixes

 $(document).ready(function(){
   
    //Create request
	var xmlhttp = new XMLHttpRequest();
    var url = "https://api.svsu.edu/courses";

    //get response
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			myFunction(xmlhttp.responseText);
		}
	}

	xmlhttp.open("GET", url, true);
	xmlhttp.send();

    //Handles the response parsing
	function myFunction(response) {
		var arr = JSON.parse(response);
		console.log(arr);
		var i;
		var out = "";
        var map = {};
        var prefixes = [];
        var totals = [];

        //create a hashmap of course prefixes
		for(i = 0; i < arr.courses.length; i++) {
            var key = arr.courses[i].prefix;
            if(key in map){
              map[key] = map[key] + 1;

            }else{
              prefixes.push(key); 
              console.log(key);
              map[key] = 1;
            }
		}

        //find the total numbers of prefixes
        for(var k in map){
            totals.push(map[k]);
        }

      //get the canvas for the chart
      var buyers = document.getElementById('chart').getContext('2d');

      //create data object for the chart
      //(a little messy)
      var data = {};
      data["labels"] = prefixes;
      var dataset = {
                 fillColor : "rgba(172,194,132,0.4)",
                 strokeColor : "#ACC26D"
               }
      dataset["data"] = totals;
      var tmp = [dataset];
      data["datasets"] = tmp;

      //set the data for the chart
      var myBarChart = new Chart(buyers).Bar(data);

      //Set the number of art cis and engl class banner
      document.getElementById('art').innerHTML  = map['ART'] + ' ART'; 
      document.getElementById('cis').innerHTML  = map['CIS'] + ' CIS'; 
      document.getElementById('engl').innerHTML = map['ENGL'] + ' ENGL'; 
    }


 });

