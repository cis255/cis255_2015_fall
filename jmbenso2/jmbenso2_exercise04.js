//filename: 	jmbenso2_exercise04.js
//purpose:  	demonstrate basics of JavaScript! WHOOO

// The best program ever written
var target = document.getElementById("target");
var greeting = (target.firstChild.innerHTML + target.lastChild.firstChild.innerHTML);
alert(greeting);
target.firstChild.innerHTML = "Butts";
target.removeChild(target.lastChild);

months = ["jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec"];
monthsHTML = "";
for (var i = 0; i < months.length; i++) {
	monthsHTML = monthsHTML +"<li>";
	monthsHTML = monthsHTML +(months[i]);
	monthsHTML = monthsHTML +"</li>";
}
document.getElementById("months").innerHTML = monthsHTML;

// Every function has prototype
// which points to blank object
//var car = function(color,sound) {
//	this.color = color;
//	this.sound = sound;
//};
// add a method to the prototype of car
//car.prototype.horn = function() {
//	document.write('this car goes '+ this.sound+".")
//};
//toyota = new car("red","beep");
//buick = new car("green","honk");
//toyota.horn();
//buick.horn();

/* NOTE: Local/global variables*/
/* Declare with var: local variable  */
/* Declare without : global variable */

/* Conditional Assignment */
/* If y is 15, x gets the value "y is 15" */
/* Otherwise x gets the value "y is not 15" */
//y = 15;
//x = (y==15) ? "y is 15" : "y is not 15";

/* Comparing number and char/string */
//var z = 9;
//if (z == 9) {
	// True
//}
//if (z == "9") {
	// Truthy
//}
//if (Z === "9") {
//	// False
//}


/* Data members */
//car = {make: "buick", model:"century"};

/* Conditionals */
//if (x=="y is 15" && y==15) {
//	greetin = "True";
//}
//else if (x =="y is not 15" && y!=15) {
//	greetin = "True";
//}
//else{
//	greetin = "FALSE";
//}

/* Loops */
//var i=0;
//while (i<10) {
//	i++;
//}

//for (var i=0; i < 10; i++){
//	console.log("Butts");
//}

// Functional declarations: No return type,
// no parameter types
//function power(x,y){
//	var pow=1;
//	for (var i = 0; i < y; i++) {
//		pow = pow * x;
//	}
//	return pow;
//};