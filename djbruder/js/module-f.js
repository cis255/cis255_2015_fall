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

	$("#celsius").keyup(function() {
		//make sure inputted data is valid
		if((isNaN(this.value) == false) && this.value != "") {
			//convert Celsius to Fahrenheit and output to screen
			$("#fahrenheit").val(((this.value*(9/5))+32).toFixed(2));
			//convert Celsius to Kelvin and output to screen
			$("#kelvin").val((this.value-273.15).toFixed(2));
		}
	});
	
	$("#kelvin").keyup(function() {
		//make sure inputted data is valid
		if((isNaN(this.value) == false) && this.value != "") {
			//convert Kelvin to Fahrenheit and output to screen
			$("#fahrenheit").val((((this.value-273.15)*(9/5))+32).toFixed(2));
			//convert Kelvin to Celsius and output to screen
			$("#celsius").val((this.value-273.15).toFixed(2));
		}
	});
	
	$("#coursePrefix").keyup(function() {
		//make sure inputted data is valid
		if(this.value != "") {
			$.ajax({
					  dataType: "json",
					  url: url,
					  data: data,
					  success: success
			});
		}
	});
	
	$("#courseNumber").keyup(function() {
		//make sure inputted data is valid
		if(this.value != "") {
			//convert Kelvin to Fahrenheit and output to screen
			$("#fahrenheit").val((((this.value-273.15)*(9/5))+32).toFixed(2));
			//convert Kelvin to Celsius and output to screen
			$("#celsius").val((this.value-273.15).toFixed(2));
		}
	});

});