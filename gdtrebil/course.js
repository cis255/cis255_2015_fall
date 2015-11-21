//Code here developed jointly by Joe Olson and Grant Trebilcock

function getInfo(){
	var cNum = document.getElementById('courseNum').value;
	var pFix = document.getElementById('prefix').value;
	
	searchSVSU(pFix, cNum);
}

function searchSVSU(prefix, courseNum){
	var url = "https://api.svsu.edu/courses?";
	deleteRows();  //Used here when multiple searches are made
	
	if(prefix != null){ //checks how to get the url by checking the prefix value
		url += "prefix=" + prefix + "&";
	}
	if(courseNum != null){ //checks how to get the url by checking the coursenum value
		url += "courseNumber=" + courseNum + "&";
	}
	
	
	$.getJSON(url, function(data) { //gathers the data from the courses and then inserts them into the table
		for(var i = 0; i < data.courses.length; i++){
			prefix = data.courses[i].prefix;
			courseNum = data.courses[i].courseNumber;
			courseTitle = data.courses[i].title;
			addRow(prefix, courseNum, courseTitle, i);
		}
	});
}

function addRow(pFix, cNum, cTitle, i){ //creates the new rows to be inserted
	var table = document.getElementById("cData");
	var newRow = table.insertRow(i+1); //Starts at 1 so it doesn't override header
	var newCell1 = newRow.insertCell(0);
	var newCell2 = newRow.insertCell(1);
	var newCell3 = newRow.insertCell(2); 
	
	newCell1.innerHTML = pFix;
	newCell2.innerHTML = cNum;
	newCell3.innerHTML = cTitle;
}

function deleteRows(){ //just deletes the rows, and doesn't empty the values of prefix and courseNum
	var table = document.getElementById("cData");
	var tableLength = table.rows.length;
	for(var i = 1; i < tableLength; i++){ //Starts at 1 so it doesn't delete header
		table.deleteRow(1);
	}
}

function clearInfo(){ //clears the table by deleting all the rows and by emptying the values of prefix and courseNum
	var table = document.getElementById("cData");
	var tableLength = table.rows.length;
	for(var i = 1; i < tableLength; i++){ //Starts at 1 so it doesn't delete header
		table.deleteRow(1);
	}
	document.getElementById("prefix").value = "";
	document.getElementById("courseNum").value = "";
}