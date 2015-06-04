
$(document).ready(function(){
var xmlhttp = new XMLHttpRequest();
var url = "https://api.svsu.edu/courses?prefix=CIS";

xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        myFunction(xmlhttp.responseText);
    }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();

function myFunction(response) {
    var arr = JSON.parse(response);
    var i;
    var out = "<table>";

    for(i = 0; i < arr.courses.length; i++) {
        out += "<tr><td>" +
        arr.courses[i].prefix +
        "</td><td>" +
        arr.courses[i].courseNumber +
		"</td><td>" +
		arr.courses[i].term +
        "</td></tr>";
    }
    out += "</table>"
    document.getElementById("id01").innerHTML = out;
}
 });