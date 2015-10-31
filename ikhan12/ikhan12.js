/*
filename: ikhan12.js
purpose : demonstrate basic javascript
*/
//    window.onload=function() {
        // do stuff

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

monthsHTML = "";
monthsHTML = monthsHTML+"<ol>";
for(i=0;i<months.length;i++){
	monthsHTML = monthsHTML+"<li>";
	monthsHTML = monthsHTML+months[i];
	monthsHTML = monthsHTML+"</li>";
}
monthsHTML = monthsHTML+"</ol>";
document.getElementById("container").innerHTML = monthsHTML;


 //   };







