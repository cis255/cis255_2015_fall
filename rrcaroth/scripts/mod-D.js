function changeIdContent() {
    document.getElementById("div1").innerHTML="Zip";
}

function changeSpanContent() {
    var spanList = document.getElementsByTagName("span");
    var j = 1;
    for (x in spanList){
        if ( j  == 2){
            spanList[x].innerHTML = "Zap";
        }
        if ( j == 3){
            spanList[x].innerHTML = "Zop";
        }
        if (j == 1) {
            spanList[x].innerHTML = "Zip";
        }
    		j += 1;
		if(j > 3) j = 1
	}
}
function deleteDivsWithSpans() {
	var divList = document.getElementsByTagName("div");
	for (x in divList){
		//if (!divList[x].getElementsByTagName("span")) {
			divList[x].parentNode.removeChild(divList[x]);
		
	}
}
