$(document).ready(function() {

	//update other units when user changes Fahrenheit unit

	$("#fahrenheit").keyup(function() {

		//make sure inputted data is valid

		if((isNaN(this.value) == false) && this.value != "") {

			//convert Fahrenheit to Celsius and output to screen

			$("#celsius").val(((this.value-32)*(5/9)).toFixed(2));

			//convert Fahrenheit to Kelvin and output to screen
			$("#kelvin").val((((this.value-32)*(5/9))+273.15).toFixed(2));
		}
	});

	//update other units when user changes Fahrenheit unit
	
	// ----- add code here
	
	//update other units when user changes Fahrenheit unit
	
	// ----- add code here

});
