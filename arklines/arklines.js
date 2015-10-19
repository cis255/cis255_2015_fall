alert('3. You should click Ok');
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

try{
	nonexistentfunction("no value")
}
catch(e){
	alert("exception caught")
}

month = ["Jan", "Feb", "March"]

monthsHTML = ""

monthsHTML = monthsHTML + "<ol>"

for(i = 0; i<month.length; i++){
	monthsHTML = monthsHTML +"<li>";
	monthsHTML = monthsHTML +month[i];
	monthsHTML = monthsHTML +"</li>";
}

monthsHTML = monthsHTML + "</ol>"

document.getElementById("container") = monthshtml;