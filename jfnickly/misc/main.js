var selectedItem = null;
var mainCanvas = null;
var plankWidth = 6;
var plankLength = 8;
var cX1, cX2, cY1, cY2;
var btnDownX = 0, btnDownY = 0;
var drawSizer = false;
var pelm = null;
var pHC = 0;
var mouseState = 0;
var useW = 320, useH = 200;
var iPrice = [ 0.6, 0.9, 1.1, 1.3 ];
var premiumCost = 1.0;
var usePrice = 0.6;
function onThis(lX, lY, X, Y) {
	if (X > lX - 5 && X < lX + 5) {
		if (Y > lY - 5 && Y < lY + 5) {
			return 1;
		}
	}
	
	return 0;
}

function onCorner(X, Y) {
	
	//if (onThis(cX1, cY1, X, Y)) return 1;
	//if (onThis(cX2, cY1, X, Y)) return 2;
	//if (onThis(cX1, cY2, X, Y)) return 3;
	if (onThis(cX2, cY2, X, Y)) return 4;
	
	return 0;
}

function hitTest(mouseIsDown) {
	var elm = document.getElementById('myCanvas');
	var X = event.pageX - elm.offsetLeft; 
	var Y = event.pageY - elm.offsetTop;

	if (mouseIsDown == 'true') {
		btnDownX = X;
		btnDownY = Y;
	} else {
		var newW = (cX2 - cX1) + (X - btnDownX);
		var newH = (cY2 - cY1) + (Y - btnDownY);
		drawDeckSize(newW, newH);
	}
	
	mouseState = mouseIsDown;

}

function hoverTest() {

	if (drawSizer && mouseState) {
		var elm = document.getElementById('myCanvas');
		var X =   event.pageX - elm.offsetLeft; 
		var Y =   event.pageY - elm.offsetTop;
		if (mouseState) {
			var hc =  onCorner(X, Y);
			
			if (hc != pHC) {
				
				if (hc) {
					elm.style.cursor = 'move';	
				} else {
					elm.style.cursor = 'auto';	
				}
				
			}
			pHC = hc;
		} 
	}
	
}

function selectMenuItem(elm) {
	var xelm = document.getElementById(elm);
	if (pelm != elm) {
		
		if (pelm != elm && pelm != null) {
			pelm.style.borderColor = '#dddddd';
			
		}
	
		xelm.style.borderColor = '#888888';
		
		drawSizer = false;
		
		switch(elm) {
			case ('btn_d'):	{	// sizer
				drawSizer = true;
				drawDeck();
			}
			break;
			default:
				drawDeck();
					
		}

	}
	pelm = xelm;
}

function selectElement(elm) {
	if (elm != null) {
		selectedItem = document.getElementById(elm);
		selectedItem.checked = true;
		selectedItem.parentNode.visibility = 'hidden';
		optionChanged();
	} 
}

function selectOption(elm) {
 	if (elm != null) {
		selectedItem = document.getElementById(elm);
		selectedItem.parentNode.visibility = 'hidden';
		optionChanged();
		drawDeck();
	} 
}

function optionChanged() {
	var capString = document.getElementById('showCaption');
	var i = 0;
	switch(selectedItem.id) {
		case 'bdSz1':
			capString.innerHTML = "6 inch";
			plankWidth = 4;
			break;
		case 'bdSz2':
			capString.innerHTML = "8 inch";
			plankWidth = 6;
			i = 1;
			break;
		case 'bdSz3':
			capString.innerHTML = "10 inch";
			plankWidth = 8;
			i = 2;
			break;
		case 'bdSz4':
			capString.innerHTML = "12 inch";
			plankWidth = 10;
			i = 3;
			break;
	}
	usePrice = (iPrice[i]);
	document.getElementById("boardSize").value = capString.innerHTML;
	

}

function showElement(elm, visible, pElm) {

	
	if (visible == 'visible') {
		document.getElementById(elm).style.visibility=visible;
		
		var obj = document.getElementById(pElm);
		var x = obj.offsetLeft;
		var y = obj.offsetTop + (obj.offsetHeight);
		document.getElementById(elm).style.left = (x + 'px');
		document.getElementById(elm).style.top = (y + 'px');
		document.getElementById(elm).tabIndex = '-1';
		document.getElementById(elm).focus();
	} else {
		var x = document.activeElement.tagName
		
		document.getElementById(elm).style.visibility=visible;
		
	}
}
	
function sizeRuler(rulerID, maxSize) {
	var liParent = document.getElementById(rulerID);
	
	while (liParent.hasChildNodes()) {   
    	liParent.removeChild(liParent.firstChild);	
	}
	var w = liParent.clientWidth;
	var i = 1;
	var iw = 25;
	if (maxSize != 0)
		w = maxSize;
		
	while (iw < w) {		
		var newChild = document.createElement("li");
		newChild.innerHTML = i;
		liParent.appendChild(newChild);
		iw = iw + 20;	
		i = i + 1;
	}
}

function drawDeckFrame(dest, d, offX, offY, x, y, w, h, color) {
	var lx = x + offX;
	var ly = y + offY;
	var lh = h - (offY + offY);
	var lw = w - (offX + offX);
	dest.setColor(color);
	dest.drawRect(lx, ly, lw, lh);
	dest.drawRect(lx+d, ly+d, lw-(d+d), lh-(d+d));

	var p = ly;
	var pe = ly + lh;

	var s = 16;
	
	p+=s;

	dest.setColor('#b0b0b2');


	while(p < pe) {
		dest.drawRect(lx, p, lw, d);
		p+=s;
	}

	cX1 = x;
	cX2 = x + w;
	cY1 = y;
	cY2 = y + h;
	 
}

function drawPlanks(dest, runH, ps, x, y, w, h, color) {
	
	
	var ip;
	var i;
	
	var p1 = x;
	var p2 = y;
	
	var x1 = p1;
	var y1 = p2;
	var ph = h; 
	var ep = x + w;
	var pw = ps;
	var pk = plankLength * 20;
	
	var tl = 0;
	var ky = y + 10;
	dest.setColor(color);
		
	while(x1<ep) {
		x2 = x1 + pw;
		if (x2 >= ep) {
			pw = ep-x1+1;	
		}

		dest.setColor(color);
		//dest.fillRect(x1, y1, pw, ph);
		//dest.setColor('#DFD0A0');
		dest.drawRect(x1, y1, pw, ph);
	/*
		while (tl < h) {
			ky = y + tl;
			dest.drawLine(x1, ky, x1 + pw, ky);
			tl+=pk;
		}
	
		tl = tl - h;
	*/
		x1 = x1 + pw + 2;
		
	}
	
}

function sizeRulers() {
		sizeRuler('hRuler', 0);
		//sizeRuler('vRuler', 300);
		
		var dTarget = document.getElementById('dCanvas');
		var xTarget = document.getElementById('myCanvas');
		var hTarget = document.getElementById('hRuler');

		var w = hTarget.offsetWidth - 2;
		var h = 500;

		xTarget.style.width = w + 'px';
		xTarget.style.height = (h-1)+'px';
		dTarget.style.height = h + 'px';
		xTarget.style.left = '0px';
		xTarget.style.top =  '0px'; 
		drawDeck();
}

function drawSizeBoxCorners(dest, s, x, y, w, h) {
	var sh = s * 0.5;
	var xs = x - sh + 1;
	var ys = y - sh + 1;
	dest.setColor('black');
	
	dest.fillRect(xs + w, ys + h, s, s);	
	dest.drawRect(xs + w - 2, ys + h - 2, s + 4, s + 4);
}
function selectBoard(dim) {
	
	var label = document.getElementById("spanMe");
	label.innerHTML = "&nbsp;&nbsp;Needed&nbsp;@&nbsp;" + dim + "'&nbsp;Lengths:&nbsp";
	plankLength = dim;
	
	switch (plankLength) {
		case 12: premiumCost = 1.25; break;
		case 14: premiumCost = 1.50; break;
		case 16: premiumCost = 1.75; break;
		default: premiumCost = 1.0; break;
	};
	drawDeck();
}

function drawDeckSize(sW, sH) {
		var x = 15;
		var y = 15;
		var w = sW;
		var h = sH;
		mainCanvas.clear();
		drawDeckFrame(mainCanvas, 5, 6, 4, x, y, w, h, '#A5A2A2'); 
		drawPlanks(mainCanvas, true, plankWidth*1.8, x, y, w, h, '#757272');
		
		if (drawSizer) {
			drawSizeBoxCorners(mainCanvas, 6, x, y, w, h);	
		}
		
		useW = sW;
		useH = sH;
		mainCanvas.paint();
		
		var runCount = (useW * 0.6) / (plankWidth+2);
		var lenRati = (useH *0.6)/(plankLength*12);
		var outPrice = usePrice*premiumCost;
		
		document.getElementById("unitPrice").value = '$' + (outPrice).toFixed(2) + ' per foot';

		document.getElementById("deckW").value = (useW * 0.05).toFixed(1) + "'";
		document.getElementById("deckH").value = (useH * 0.05).toFixed(1) + "'";
		
		document.getElementById("countNeeded").value = runCount.toFixed(0) + " runs using " + (lenRati * runCount).toFixed(0) + " boards";

		document.getElementById("total").value = "total: $" + (lenRati * runCount * outPrice * plankLength).toFixed(2);

		
}
function drawDeck() {
		drawDeckSize(useW, useH);
		
}

function initialize() {
	mainCanvas = new jsGraphics("myCanvas")

	selectElement('bdSz2');
	sizeRulers();
}
	
	
	