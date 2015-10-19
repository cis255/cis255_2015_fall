alert('3. You should click Ok');
console.log("Finished alert #3")
var car = function (color,sound) {
	this.color = color;
	this.sound = sound;
	};
	
car.prototype.horn = function () {
		document.write('This car goes ' + this.sound + "<br />")
	};
	
toyota = new car("red","beep");
buick = new car("green", "honk");

toyota.horn();
buick.horn();

months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July"];

monthsHTML = "";
monthsHTML = monthsHTML + "<ol>";

for (i = 0; i < months.length; i++) {
	monthsHTML = monthsHTML + "<li>";
	monthsHTML = monthsHTML + months[i];
	monthsHTML = monthsHTML + "</li>";
}

monthsHTML = monthsHTML + "</ol>";

document.getElementById("container").innerHTML = monthsHTML;
