//weather.js
// originally copied from gpcorsers folder
// then heavily edited..
function getWeather(location) {
	if (location == undefined) {
		var location = document.getElementById("loc").value;
	}

	var url = "https://query.yahooapis.com/v1/public/yql?q=SELECT * FROM weather.forecast WHERE woeid in (select woeid from geo.places(1) where text='" + location + "') and u='f'&format=json";

	$.getJSON( url, function( data ) {
		console.log(data);
					$("#forecastList li").remove(); // removes the elements of the five day forcast and later 
													// re-writes them to the screen with updated locatons


		if (data.query.count > 0) { // location was found
			location = data.query.results.channel.location.city
			
			if (data.query.results.channel.location.region != "") {
				location += ", " + data.query.results.channel.location.region;
			}

			var temp = data.query.results.channel.item.condition.temp;
			var cond = data.query.results.channel.item.condition.text;
	
			var find  = document.getElementById('find');
			var found = document.getElementById('found');

			var my_loc  = document.getElementById('chosenLoc');
			var my_cond = document.getElementById('condition');
			var my_temp = document.getElementById('temp');
		
			for (var i = 0; i < data.query.results.channel.item.forecast.length; i++)
			{
				$("#forecastList").append("<li id='forecast'>"+ data.query.results.channel.item.forecast[i].day + "|Hi "+data.query.results.channel.item.forecast[i].high +" |Low " +data.query.results.channel.item.forecast[i].low +"</li>");
			}//appends the list items to the existing ul in the html program 
	
			my_temp.innerHTML = "Weather for " + location + "| " + temp + " degrees|"+ cond;

			find.style.display  = 'none';
			found.style.display = 'block';
		} else { // location was not found
			document.getElementById('error').style.display = 'block';
		}
	});
}

function showSearch() {
	var find  = document.getElementById('find');
	var found = document.getElementById('found');

	find.style.display  = 'block';
	found.style.display = 'none';
}

$( document ).ready(function() {
	$.get("http://ipinfo.io", function(response) {
	    var location = response.city + ", " + response.region;
	    getWeather(location);
	}, "jsonp");
});
