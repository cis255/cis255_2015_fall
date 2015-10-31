var shipCostPerPound = 1;

//==============================
// Helper functions
//==============================

//If test exist return it, otherwise return defaultValue
function defaultValue(test,defaultValue) {
	return (typeof test !== 'undefined' ? test : defaultValue);
}

//Placeholder function for getting the next order
function NextOrder() {
	return 1;
}

//Date function ripped from 
//http://stackoverflow.com/questions/1531093/how-to-get-current-date-in-javascript
//Returns date in DD/MM/YYYY format
function GetDate() {
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1;
	var yyyy = today.getFullYear();

	if(dd<10) {
		dd='0'+dd
	} 

	if(mm<10) {
		mm='0'+mm
	} 

	return mm+'/'+dd+'/'+yyyy;
}
//==============================
// Item object
//==============================

//Item constructor. All params are optional
//5. Create object of freight amounts and weights
function Item(itemNum,name,description,quantity,price,weight) {
	this.itemNum = defaultValue(itemNum,0);
	this.name = defaultValue(name,0);
	this.description = defaultValue(description,"No Description");
	this.quantity = defaultValue(quantity,1);
	this.price = defaultValue(price,1);
	this.weight = defaultValue(weight,1);
}

Item.prototype.amount = function amount() {
	return this.price*this.quantity;
}

Item.prototype.shipCost = function shipCost() {
	return this.weight*shipCostPerPound*this.quantity;
}
//==============================
// Customer object
//==============================

//All objects are optional, defaults to empty string
function Customer(name,street,city,state,zip) {
	this.name = defaultValue(name,"");
	this.street = defaultValue(street,"");
	this.city = defaultValue(city,"");
	this.state = defaultValue(state,"");
	this.zip = defaultValue(zip,"");
	this.taxRate=0.06;
}

Customer.prototype.setZip = function setZip(zip){
	this.zip=zip;
}


//==============================
// Order object
//==============================
function Order() {
	this.orderNumber=NextOrder();
	this.orderDate=GetDate();
	this.customerName="";
	this.customer = new Customer();
	this.items = new Array();
}

Order.prototype.subtotal = function() {
	var total=0;
	for (var i=0;i<items.length;i++) {
		total += item[i].amount();
	}
	return total;
}

Order.prototype.freightAmount = function() {
	var total=0;
	for (var i=0;i<items.length;i++) {
		total += item[i].shipCost();
	}
	return total;
}

Order.prototype.tax = function() {
	var rate = this.customer.taxRate;
	return this.total()*rate;
}

Order.prototype.total = function() {
	return this.subtotal()+this.freightAmount()+this.tax();
}