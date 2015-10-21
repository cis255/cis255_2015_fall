alert('3. You clicked ok');
console.log("finished alert #3")
var car = function (color, sound){
	this.color = color;
	this.sound = sound;	
	};
car.prototype.horn = function () {
    document.write('<p>this car goes ' + this.sound + "</p>");
	};
toyota = new car("red","beep");
buick = new car("green","honk");
toyota.horn();
buick.horn();

try {
	nonexistentfunction("not here");
}
catch (e){
	alert("exception caught!!")
}