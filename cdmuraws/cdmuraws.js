/*
filename  : cdmuraws.js
purpose   : demonstrate basic javascript
*/
alert('3. You should click OK');
console.log("finished alert #3");
var car = function (color,sound) {
	this.color = color;
	this.sound = sound;
	};
car.prototype.horn = function () {
	document.write('<br /> this car goes ' + this.sound)
	};
toyota = new car("red","beep");
buick = new car("green", "honk");
toyota.horn();
buick.horn();

try {
	nonexistentfunction("not here");
}
catch (e){
	alert("exception caught!!!")
}

months = ["jan","feb","mar","apr","may"]

monthsHTML = "";
monthsHTML = monthsHTML + "<ol>";
for (i=0; i < months.length; i++) {
	monthsHTML = monthsHTML + "<li>";
	monthsHTML = monthsHTML + months[i]
	monthsHTML = monthsHTML + "</li>";
}
monthsHTML = monthsHTML + "</ol>";
document.getElementById("container").innerHTML = monthsHTML;