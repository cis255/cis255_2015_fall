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
		if((isNaN(this.value)==false) && this.value != "") {			
			$("#fahrenheit").val((this.value*(9/5)+32).toFixed(2));
			$("#kelvin").val((parseFloat(this.value)+273.15).toFixed(2));
		}
	});
	
	//update other units when user changes Kelvin unit
	$("#kelvin").keyup(function(){
		if((isNaN(this.value)==false) && this.value != ""){
			$("#celsius").val((this.value-273.15).toFixed(2));
			$("#fahrenheit").val((this.value*(9/5)+32).toFixed(2));
		}
	});

});