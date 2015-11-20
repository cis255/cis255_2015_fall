function getInfo(){
	var cNum = document.getElementById('courseNum').value;
	var pFix = document.getElementById('prefix').value;
	
	searchSVSU(pFix, cNum);
}

function searchSVSU(prefix, courseNum){
	var url = "https://api.svsu.edu/courses?";
	deleteRows();
	
	if(prefix != null){
		url += "prefix=" + prefix + "&";
	}
	if(courseNum != null){
		url += "courseNumber=" + courseNum + "&";
	}
	
	
	$.getJSON(url, function(data) {
		for(var i = 0; i < data.courses.length; i++){
			prefix = data.courses[i].prefix;
			courseNum = data.courses[i].courseNumber;
			courseTitle = data.courses[i].title;
			addRow(prefix, courseNum, courseTitle, i);
		}
	});
}

function addRow(pFix, cNum, cTitle, i){
	var table = document.getElementById("cData");
	var newRow = table.insertRow(i+1);
	var newCell1 = newRow.insertCell(0);
	var newCell2 = newRow.insertCell(1);
	var newCell3 = newRow.insertCell(2);
	
	newCell1.innerHTML = pFix;
	newCell2.innerHTML = cNum;
	newCell3.innerHTML = cTitle;
}

function deleteRows(){
	var table = document.getElementById("cData");
	var tableLength = table.rows.length;
	for(var i = 1; i < tableLength; i++){
		table.deleteRow(1);
	}
}

function clearInfo(){
	var table = document.getElementById("cData");
	var tableLength = table.rows.length;
	for(var i = 1; i < tableLength; i++){
		table.deleteRow(1);
	}
	document.getElementById("prefix").value = "";
	document.getElementById("courseNum").value = "";
}