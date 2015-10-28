/**
 * Created by bjcobb on 10/27/2015.
 */
function fillItemData(items) {
    for (var i=0; i<10;i++) {
        var name="Item "+i;
        var price=i*(.10^i)+1;
        var description="This is item number "+i;
        var weight=i;
        items[i]= new Item(100+i,name,description,1,price,weight);
        items[i].label=100+1;
    }
}
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}

function getOrderNumber()
{
    return getRandomInt(1000,2000);
}