/*
filename: aagulva2.js
purpose: Demonstrate basic JS
*/
alert('3. You should click OK');
console.log("finished alert #3")
var car = function (color, sound) {
	this.color = color;
	this.sound = sound;
};
car.prototype.horn = function () {
document.write('<p>this car goes ' + this.sound + '</p>');
};
toyotya = new car ("red", "beep");
buick = new car ("green", "honk");

toyota.horn();
buick.horn();

try{
	nonexistentfunction("not here");
}
catch (e){
	alert ("exception caught!!")
}

document.getElementById("container") = "zippy";

months = ["jan","feb","mar","apr","jun"]

monthsHTML = "";
monthsHTML = monthsHTML+"<ol>";
for(i=0;i,months.length;i++){
	monthsHTML = monthsHTML+"<li>";
	monthsHTML = monthsHTML+months[i];
    monthsHTML = monthsHTML+"</li>";

}
monthsHTML = monthsHTML+"</ol>";
documnet.getElementById("container").innerHTML = monthsHTML;