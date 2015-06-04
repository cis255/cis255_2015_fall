
$(document).ready(function(){

	$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
); 

$(document).ready(function() 
    { 
        $("#myTable").tablesorter( {sortList: [[0,0], [1,0]]} ); 
    } 
); 

$(document).ready(function() 
    { 
        $("#myTable").tablesorter( {dateFormat: 'pt'} ); 
    } 
); 
});