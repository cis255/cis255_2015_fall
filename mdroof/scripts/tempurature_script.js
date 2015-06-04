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
	

	//update other units when user changes Celsius unit
	$("#celsius").keyup(function() {
		//make sure inputted data is valid
		if((isNaN(this.value) == false) && this.value != "") {
			//convert Fahrenheit to Celsius and output to screen
			$("#fahrenheit").val(((this.value*(9/5)+32)).toFixed(2));
			//convert Fahrenheit to Kelvin and output to screen
			$("#kelvin").val(((this.value-(-273.15)).toFixed(2)));
		}
	});
	// ----- add code here
	
	//update other units when user changes Kelvin unit
	$("#kelvin").keyup(function() {
		//make sure inputted data is valid
		if((isNaN(this.value) == false) && this.value != "") {
			//convert Fahrenheit to Celsius and output to screen
			$("#celsius").val(((this.value-273.15).toFixed(2)));
			//convert Fahrenheit to Kelvin and output to screen
			$("#fahrenheit").val(((((this.value-32) - 273.15)*1.8).toFixed(2)));
		}
	});
	// ----- add code here

});
