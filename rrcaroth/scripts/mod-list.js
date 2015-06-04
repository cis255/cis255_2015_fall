$(document).ready(function(){
	$("tr").mouseenter(function(){
			$("tr").addClass("highlight");
		});
    $("tr").mouseleave(function(){
			$("table tr").removeClass("highlight");
		});
});