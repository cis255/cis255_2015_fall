
// Author: Chad Schroeder
// Summary: Lets a user enter in measurement for deck dimensions 
		 // as well as board measurements and board cost. Using 
		 // ajax the output of total cost and amount of boards needed
		 // for the deck will be shown.
// Design:  1- on document ready the main function begins
		 // 2- for each input create a function to listen for keyup
		 // 3- within each function get input values
		 // 4- calculate value for total boards and cost
		 // 5- within a for loop use inner html to build the layout of the deck 
		 





$(document).ready(function(){
	
		// Focuses on an the first input box
		$("#deckLengthInput").focus();
		
		//function for Board Width Input
		// Starts this function on keyup within the input with correct id
	  $("#boardWidthInput").keyup(function() {
		  // Gets Values
		var deckLength = $("#deckLengthInput").val();
		var deckWidth = $("#deckWidthInput").val();
		var boardLength = $("#boardLengthInput").val();
		var boardWidth = $("#boardWidthInput").val();
		var costPerBoard = $("#costPerInput").val();
		// Calculates Output values
		var numberOfBoards = ((deckLength / boardLength)*(deckWidth / boardWidth))
		$("#numberBoardsOutput").val(numberOfBoards);
		var total = (numberOfBoards * costPerBoard);
		$("#totalOutput").val(total);
		// Declare and calculate variables 
		var board = "";
		var br = '<br>';
		var boardsWide = 0;
		var boardsLong = 0;
		boardsWide = (deckWidth / boardWidth);
		boardsLong = (deckLength / boardLength);
		// Enter if staement if conditions are met
		if(boardsLong != "" && boardsLong != "" && boardsLong != "infinity" && boardsWide != "infinity"){
			//loops through variables to insert board to HTML
			for(i= 0; i < boardsWide; i++){
				
			for(x = 0; x < boardsLong; x++){
				//builds deck
					board = board += "----------------------------- ";
			}
			//adds line break and outputs board and outputs to html on every iteration
			board = board += '<br>'
			document.getElementById("insertBoard").innerHTML = board;
		}
		}
		if((isNaN(this.value) == false) && this.value != "") {
			//outputs correct number of boards needed
			$("#numberBoardsOutput").val((numberOfBoards).toFixed(2));
		}
	});//end function
	
	//Function for Board Length Input
	// Starts this function on keyup within the input with correct id
	$("#boardLengthInput").keyup(function() {
		//get input values
		var deckLength = $("#deckLengthInput").val();
		var deckWidth = $("#deckWidthInput").val();
		var boardLength = $("#boardLengthInput").val();
		var boardWidth = $("#boardWidthInput").val();
		var costPerBoard = $("#costPerInput").val();
		//calculate values and output them 
		var numberOfBoards = ((deckLength / boardLength)*(deckWidth / boardWidth))
		$("#numberBoardsOutput").val(numberOfBoards);
		var total = (numberOfBoards * costPerBoard);
		$("#totalOutput").val(total);
		//declare and calculate variables for building deck
		var board = "";
		var br = '<br>';
		var boardsWide = 0;
		var boardsLong = 0;
		boardsWide = (deckWidth / boardWidth);
		boardsLong = (deckLength / boardLength);
		//if conditions are met enter the statement
		if(boardsLong != "" && boardsLong != "" && boardsLong != "infinity" && boardsWide != "infinity"){
			//start for loop for building deck
			for(i= 0; i < boardsWide; i++){
				
			for(x = 0; x < boardsLong; x++){
				//builds the deck 
					board = board += "----------------------------- ";
			}
			//adds a line break to board and outputs to html on every iteration
			board = board += '<br>'
			document.getElementById("insertBoard").innerHTML = board;
		}
		}
		if((isNaN(this.value) == false) && this.value != "") {
			//outputs correct number of boards needed
			$("#numberBoardsOutput").val((numberOfBoards).toFixed(2));
		}
	});//end function
	
	//Function for the deck length input
	// Starts this function on keyup within the input with correct id
	$("#deckLengthInput").keyup(function() {
		//gets the values for inputs
		var deckLength = $("#deckLengthInput").val();
		var deckWidth = $("#deckWidthInput").val();
		var boardLength = $("#boardLengthInput").val();
		var boardWidth = $("#boardWidthInput").val();
		var costPerBoard = $("#costPerInput").val();
		//calculates and outputs variables 
		var numberOfBoards = ((deckLength / boardLength)*(deckWidth / boardWidth))
		$("#numberBoardsOutput").val(numberOfBoards);
		var total = (numberOfBoards * costPerBoard);
		$("#totalOutput").val(total);
		//define and calculate variables for for loop
		var board = "";
		var br = '<br>';
		var boardsWide = 0;
		var boardsLong = 0;
		boardsWide = (deckWidth / boardWidth);
		boardsLong = (deckLength / boardLength);
		//if conditions are met enter the statement
		if(boardsLong != "" && boardsLong != "" && boardsLong != "infinity" && boardsWide != "infinity"){
			for(i= 0; i < boardsWide; i++){
				
			for(x = 0; x < boardsLong; x++){
				//build the deck
					board = board += "----------------------------- ";
			}
			//add a line break to board and output it to html on every iteration
			board = board += '<br>'
			document.getElementById("insertBoard").innerHTML = board;
		}
		}
		if((isNaN(this.value) == false) && this.value != "") {
			//displays the correct number of boards needed for deck
			$("#numberBoardsOutput").val((numberOfBoards).toFixed(2));
		}
	});//end function
	
	//Function for the deck width input
	// Starts this function on keyup within the input with correct id
	$("#deckWidthInput").keyup(function() {
		//get the input values
		var deckLength = $("#deckLengthInput").val();
		var deckWidth = $("#deckWidthInput").val();
		var boardLength = $("#boardLengthInput").val();
		var boardWidth = $("#boardWidthInput").val();
		var costPerBoard = $("#costPerInput").val();
		//calculates and outputs the correct values
		var numberOfBoards = ((deckLength / boardLength)*(deckWidth / boardWidth))
		$("#numberBoardsOutput").val(numberOfBoards);
		var total = (numberOfBoards * costPerBoard);
		$("#totalOutput").val(total);
		//declares and calculates values for for loop
		var board = "";
		var br = '<br>';
		var boardsWide = 0;
		var boardsLong = 0;
		boardsWide = (deckWidth / boardWidth);
		boardsLong = (deckLength / boardLength);
		//if conditions are met enter the statement 
		if(boardsLong != "" && boardsLong != "" && boardsLong != "infinity" && boardsWide != "infinity"){
			for(i= 0; i < boardsWide; i++){
				
			for(x = 0; x < boardsLong; x++){
				//builds the deck
					board = board += "----------------------------- ";
			}
			//adds a line break to board and outputs board to html on every iteration 
			board = board += '<br>'
			document.getElementById("insertBoard").innerHTML = board;
		}
		}
		if((isNaN(this.value) == false) && this.value != "") {
			//displays the correct number of boards needed for deck
			$("#numberBoardsOutput").val((numberOfBoards).toFixed(2));
		}
		});//end function
		
		//Function for the cost output function
		// Starts this function on keyup within the input with correct id
	$("#costPerInput").keyup(function() {
		//gets the input values
		var deckLength = $("#deckLengthInput").val();
		var deckWidth = $("#deckWidthInput").val();
		var boardLength = $("#boardLengthInput").val();
		var boardWidth = $("#boardWidthInput").val();
		var costPerBoard = $("#costPerInput").val();
		//calculates and outputs the correct values 
		var numberOfBoards = ((deckLength / boardLength)*(deckWidth / boardWidth))
		$("#numberBoardsOutput").val(numberOfBoards);
		var total = (numberOfBoards * costPerBoard);
		$("#totalOutput").val(total);
		// decalres and calculates values for for loop
		var board = "";
		var br = '<br>';
		var boardsWide = 0;
		var boardsLong = 0;
		boardsWide = (deckWidth / boardWidth);
		boardsLong = (deckLength / boardLength);
		//if conditions are met enter the statement 
		if(boardsLong != "" && boardsLong != "" && boardsLong != "infinity" && boardsWide != "infinity"){
			for(i= 0; i < boardsWide; i++){
				
			for(x = 0; x < boardsLong; x++){
				//builds the deck
					board = board += "----------------------------- ";
			}
			//adds a line break to board and outputs to html on every iteration
			board = board += '<br>'
			document.getElementById("insertBoard").innerHTML = board;
		}
		}
		if((isNaN(this.value) == false) && this.value != "") {
			//displays the correct number of boards needed for deck
			$("#totalOutput").val((total).toFixed(2));
		}
	});//end function
	

 
 });//end document ready function