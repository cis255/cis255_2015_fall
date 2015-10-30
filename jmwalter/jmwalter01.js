alert('this is external');

var numVar = 9;
var stringVar = "9";
var loopCount = 12;

if (numVar == stringVar)
	{
		document.write('<br/>The variables numVar and stringVar have the same value.<br/>');
	}
else 
	document.write("<br/>The Variables numVar and stringVar do not have the same value.<br/>");

if (numVar === stringVar)
	{
		document.write('<br/>The variables numVar and stringVar have the same value and data type.<br/>');
	}
else 
	document.write("<br/>The Variables numVar and stringVar do not have the same value and data type.<br/>");

document.write("<br/>This is a test for looping in js.");"
for (i = 0; i < loopCount; i++)
	{
		document.write("<br/>The loop Counter is " + i + "at this point.");
	}

