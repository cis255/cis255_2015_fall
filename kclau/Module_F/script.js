$(document).ready(function() {
	var C="ºC"
	//update other units when user changes Fahrenheit unit
	$("#fahrenheit").keyup(function() {
		//make sure inputted data is valid
		//inNan --> make sure it is number
		if((isNaN(this.value) == false) && this.value != "") {
			//convert Fahrenheit to Celsius and output to screen
			//tofixed --> 2 point position
			$("#celsius").val(((this.value-32)*(5/9)).toFixed(2)) + C.toLocaleString;
			//convert Fahrenheit to Kelvin and output to screen
			$("#kelvin").val((((this.value-32)*(5/9))+273.15).toFixed(2));
		}
	});

	//update other units when user changes celsius unit
	
	$("#celsius").keyup(function() {
		//make sure inputted data is valid
		//inNan --> make sure it is number
		if((isNaN(this.value) == false) && this.value != "") {
			//convert Celsius to Fahrenheit and output to screen
			//tofixed --> 2 point position
			$("#fahrenheit").val((this.value*(9/5)+32).toFixed(2));
			//convert Celsius to Kelvin and output to screen
			$("#kelvin").val(((this.value-0)+273.15).toFixed(2));
		}
	});
	
	//update other units when user changes Fahrenheit unit
	
		$("#kelvin").keyup(function() {
		//make sure inputted data is valid
		//inNan --> make sure it is number
		if((isNaN(this.value) == false) && this.value != "") {
			//convert Celsius to Fahrenheit and output to screen
			//tofixed --> 2 point position
			$("#fahrenheit").val(((((this.value-273.15)*1.8)+32)).toFixed(2));
			//convert Celsius to Kelvin and output to screen
			$("#celsius").val(((this.value-0)-273.15).toFixed(2));
		}
	});

});