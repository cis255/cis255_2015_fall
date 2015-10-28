/*  alert, document.write, console.log are ways to write to screen. */
alert('3. Click Ok');
console.log("finished alert #3")
console.log("finished alert #3")
var car = function (color,sound) {
	this.color = color;
	this.sound = sound;
	};
car.prototype.horn = function () {
	document.write('this car goes ' + this.sound + "<br />");
	};
toyota = new car("red","beep");
buick = new car("green","honk");

toyota.horn();
buick.horn();

try {
	nonexistentfunction("not here");
}
catch (e){
	alert("exception caught!")
}
/*document.getElementById("container").innerHTML = "zippy";*/

months = ["jan","feb","mar","apr","may"];
monthsHTML = "";
monthsHTML = monthsHTML+"<ol>";
for (i=0; i< months.length; i++)
{
	monthsHTML = monthsHTML + "<li>" + months[i] + "</li>";
}
monthsHTML = monthsHTML+"</ol>";
document.getElementById("container").innerHTML = monthsHTML;