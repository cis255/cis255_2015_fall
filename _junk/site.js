
$(document).ready(function(){
	$(".headerThree").hide();
	$("#moduleList").hide();
	$("#showList").hide();
	
    $(".author").click(function(){
        $(this).hide();
		$(".headerThree").fadeIn("slow")
		$("#showList").show();
    });
	
	$("#showList").click(function(){
		$("#moduleList").fadeIn("slow")
		$("#showList").hide();
	})
});