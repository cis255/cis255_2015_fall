alert('you should really click ok');
console.log("finished alert #3");
var car = function(color, sound){
	this.color = color;
	this.sound = sound;
};
car.prototype.horn = function(){
	document.write('this car goes ' + this.sound + "<br />")
};
toyota = new car("red","beep");
buick = new car("green, "honk");
toyota.horn();
buick.horn();

try{
	nonexistantfunction("not here");
}
catch (e){
	alert('There is nothing here');
}

document.getElementById("container") = "textthings";

months = ["jan", "feb", "mar", "apr", "may"]
monthsHTML = "";
monthsHTML = monthsHTML+"<ol>"
for(i=0;i<months.length();i++){
	monthsHTML = monthsHTML+"<li>";
	monthsHTML = monthsHTML+months[i]
	monthsHTML = monthsHTML+ "</li>"
}
monthsHTML = monthsHTML+"</ol>";