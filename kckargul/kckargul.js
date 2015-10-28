alert('3. You should click Ok');
console.log("finished alert #3")
var car = function (color,sound){
		this.color = color;
		this.sound = sound;
};
car.prototype.horn = function(){
	document.write('<br/>this car goes '+this.sound);
};
toyota = new car("red","beep");
buick = new car("green", "honk");
toyota.horn();
buick.horn();

try {
	nonexistentfunction("not here")
}
catch (e){
	alert("exception caught!!")
}
document.getElementById("container")="zippy";

months = ["jan", "Feb", "Mar", "Apr", "May"]

monthsHTML = "";
monthsHTML = monthsHTML+"<ol>";
for(i=0;i<months.length(),i++){
	monthsHTML = monthsHTML+"<li>";
	monthsHTML = monthsHTML+months[i];
	monthsHTML = monthsHTML+"</li>";
}
monthsHTML = monthsHTML+"</ol>";
document.getElementById("container") = monthsHTML;
