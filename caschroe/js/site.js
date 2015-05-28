$(document).ready(function(){
	$("#headerThree").hide();
	$("#moduleList").hide();
	
    $("#author").click(function(){
        $(this).hide();
		$("#headerThree").fadeIn("slow");
		$("#moduleList").fadeIn("slow");
    });
	
	
	var d = new Date();

	var month = d.getMonth()+1;
	var day = d.getDate();

	var output = "Date: " + ((''+month).length<2 ? '0' : '') + month +
	'/' + ((''+day).length<2 ? '0' : '') + day + '/' +
	d.getFullYear();
	document.getElementById("date").innerHTML = output;
});
