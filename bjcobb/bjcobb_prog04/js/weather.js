function getWeather(location) {
	if (location == undefined) {
		var location = document.getElementById("loc").value;
	}

	var url = "https://query.yahooapis.com/v1/public/yql?q=SELECT * FROM weather.forecast WHERE woeid in (select woeid from geo.places(1) where text='" + location + "') and u='f'&format=json";

	$.getJSON( url, function( data ) {
		//console.log(data);

		if (data.query.count > 0) { // location was found
			var temp = data.query.results.channel.item.condition.temp;
			var cond = data.query.results.channel.item.condition.text;
			var desc = data.query.results.channel.item.description;
			var condImage = desc.match(/<img src="(.*)"\/>/ig)[0];

			var found = document.getElementById('found');

			var wImage = document.getElementById('wImage');
			var my_cond = document.getElementById('cond');
			var my_temp = document.getElementById('temp');

			my_temp.innerHTML = temp;
			my_cond.innerHTML = cond;

			if (wImage !==null)
				wImage.innerHTML = condImage;


			found.style.display = 'block';
		} else { // location was not found
			document.getElementById('error').style.display = 'block';
		}
	});
}

function showSearch() {
	var find  = document.getElementById('find');
	var found = document.getElementById('found');

	//find.style.display  = 'block';
	//found.style.display = 'none';
}