alert('NIMWIT!');
var car = function (color, sound){
	this.color = color;
	this.sound = sound;
};
car.prototype.horn = function(){
	document.write('this car goes ' + this.sound)
};
toyota = new car("red", "beep");
toyota.horn();

try {
	nonexistentfunction("not here");
}

catch (e){
	alert ("exception caught!!")
}

document.getElementById("container")="notZippy";

months = ["jan","feb"]

monthsHTML = "";
for(i=0;i<months.length();i++){
	monthsHTML=monthsHTML+"<li>";
	monthsHTML=monthsHTML+months[i];
	monthsHTML=monthsHTML+"</li>";
}

monthsHTML = monthsHTML+"</ol>";
document.getElementById("container").innerHTML =monthsHTML;