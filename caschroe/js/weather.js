// Design- first is the function to ge the current weather
		// 2- the function uses a $.get to get the current weather from an api
		// 3- it then set values of variables
		// 4- assigns variables to innerHTML to display values
		// 5- Then there is another function for the search location window
		// 6- Last there is a function that loads on document ready to load weather on page load

		
		// Function for getting weather
function getWeather(location) {
	// Condition for undefined location
	if (location == undefined) {
		var location = document.getElementById("loc").value;
	}
	// Url to use in $.get
	var url = "https://query.yahooapis.com/v1/public/yql?q=SELECT * FROM weather.forecast WHERE woeid in (select woeid from geo.places(1) where text='" + location + "') and u='f'&format=json";

	$.getJSON( url, function( data ) {
		console.log(data);
		
		// Assignment of location if conditions are met
		if (data.query.count > 0) {
			location = data.query.results.channel.location.city
			
			if (data.query.results.channel.location.region != "") {
				location += ", " + data.query.results.channel.location.region;
			}

			location += ", " + data.query.results.channel.location.country;

			var temp = data.query.results.channel.item.condition.temp;
			var cond = data.query.results.channel.item.condition.text;

			var find  = document.getElementById('find');
			var found = document.getElementById('found');

			var my_loc  = document.getElementById('location');
			var my_cond = document.getElementById('cond');
			var my_temp = document.getElementById('temp');

			my_temp.innerHTML = temp;
			my_cond.innerHTML = cond;
			my_loc.innerHTML  = location;

			find.style.display  = 'none';
			found.style.display = 'block';
		} else {
			// Error condition
			document.getElementById('error').style.display = 'block';
		}
	});
}
// Function to display the search 
function showSearch() {
	var find  = document.getElementById('find');
	var found = document.getElementById('found');

	find.style.display  = 'block';
	found.style.display = 'none';
}
// Function for showing current location on document ready
$( document ).ready(function() {
	$.get("http://ipinfo.io", function(response) {
	    var location = response.city + ", " + response.region;
	    getWeather(location);
	}, "jsonp");
});