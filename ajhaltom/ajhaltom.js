/*
filename: ajhaltom.js
purpose : demonstrate basic javascript
*/
alert('3. You should click OK');
console.log("Finished alert #3");
var car = function (color,sound) {
		this.car = color;
		this.sound = sound;
		};
car.prototype.horn = function () {
	document.write('this car goes ' + this.sound + "<br />")
	};
toyota = new car("red","beep");
buick = new car("green","honk");
document.write("<br />");
toyota.horn();
buick.horn();

try {
	nonexistentfunction("not here"); 
}
catch (e) {
	alert("exception caught!!")
}
