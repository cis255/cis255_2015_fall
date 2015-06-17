 $(document).ready(function(){

	var xmlhttp = new XMLHttpRequest();
        var url = "https://api.svsu.edu/courses";

	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			myFunction(xmlhttp.responseText);
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send();

	function myFunction(response) {
		var arr = JSON.parse(response);
		console.log(arr);
		var i;
		var out = "";
        var map = {};
        var prefixes;
        var totals;

		for(i = 0; i < arr.courses.length; i++) {
            var key = arr.courses[i].prefix;
            if(key in map){
              map[key] = map[key] + 1;
            }else{
              prefixes.push(key); 
              map[key] = 1;
            }
		}

        for each (var k in map){

            totals.push(map[k]);

        }

      var buyers = document.getElementById('chart').getContext('2d');

      var data = {
          labels : ["January","February","March","April","May","June"],
          datasets : [
               {
                 fillColor : "rgba(172,194,132,0.4)",
                 strokeColor : "#ACC26D",
                 data : [203,156,99,251,305,247]
               }
         ]
      }

      var data;
      data["labels"] : prefixes;
      var dataset = {
                 fillColor : "rgba(172,194,132,0.4)",
                 strokeColor : "#ACC26D"
               }
      dataset[data] : totals;
      data["datasets"] : dataset;

      var myBarChart = new Chart(buyers).Bar(data);
    });

