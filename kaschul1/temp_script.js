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

	//update other units when user changes celsius unit

	$("#celsius").keyup(function() {
	
		//make sure inputted data is valid
		
		if((isNaN(this.value) == false) && this.value != "") {
		
			//convert Celsius to fahrenheit and output to screen
			
			$("#fahrenheit").val(((this.value*1.8)+32).toFixed(2));
			
			//convert Celsius to Kelvin and output to screen
			
			$("#kelvin").val(((this.value-(-273.15)).toFixed(2)));
			
		}
	});
	

	//update other units when user changes kelvin unit
	
	$("#kelvin").keyup(function() {

		//make sure inputted data is valid

		if((isNaN(this.value) == false) && this.value != "") {

			//convert kelvin to fahrenheit and output to screen

			$("#fahrenheit").val(((this.value * (5/9)) -459.67).toFixed(2));

			//convert kelvin to celsius and output to screen

			$("#celsius").val((this.value - 273.15).toFixed(2));
			
		}
	});


});