/*
filename: gpcorser.js
purpose : demonstrate basic javascript
*/


var car = function (color,sound) {
    this.color = color;
	this.sound = sound;
	};
car.prototype.horn = function () {
    document.write('<p>this car goes ' + this.sound + '</p>');
	};
toyota = new car("red","beep");
buick = new car("green","honk");

toyota.horn();
buick.horn();

try {
	nonexistentfunction("not here");
}
catch (e){
	document.write("exception caught: nonexistent function <br/>")
}

months = ["jan","feb","mar","apr","may"]

monthsHTML = "<p>The section of code below was created from gpcorser.js</p>";
monthsHTML = monthsHTML+"<ol>";
for(i=0;i<months.length;i++){
	monthsHTML = monthsHTML+"<li>";
	monthsHTML = monthsHTML+months[i];
	monthsHTML = monthsHTML+"</li>";
}
monthsHTML = monthsHTML+"</ol>";
document.getElementById("months").innerHTML = monthsHTML;









