<!DOCTYPE html>
<html lang="en">
<head>
	<!--  
		Program_02:
			1. _crud has been copied.
		2. index, create, delete, read, and update were edited.
		3. I used relative referencing on this page around line 35 that looks like: <link   href="css/bootstrap.min.css" rel="stylesheet">
			On the next line, I use absolute referencing.
		4. 	external css is used all over the place in this page 
			internal css is used --
			inline is used --
		5. i actually had to go into the css of a few different classes in the css files and modify the margins to fit right	
			infact the buttons gave me the most trouble because they were to big and stagered.. so i searched for btn in the css file
			and just adjusted the padding so they were on one line instead of wrapping down. 
			-- use/change 20 bootstrap tags-- ... check!
		6. -- use important tag-- check
		
		7. there are several class and element selectors in the css files that i personally edited such as .btn .tbody and body
			
		8. location is the trickies part of my css links for example when i tried to edit the button size i was doing it in the wrong
			file at first and then had to go to the clean.blah.blah css file to change it, as well as the fonts.
			specificity was also a pain in this site because there were already so many EXTREAMLY specific settings in the bootstrap
			it was hard to understand how to change a certian element, since i didnt write the css i had to atleast skim it to figure out things
			inhearitance was not as difficult in this site the biggest was when i was changing the font using fontsquirl and had to change most 
			itterations of font-family to get the font to change everywere i decided to change all locations of font family to be safe!
		
		9. -- add images-- not sure what you ment by the 5 files but i used paint.net and gimp to create my own custmo banner the same
							dimmentions as the stock one, plus i did that for a all the pages about ect. and added the icons so i hope thats what you meant 
		10.	
		extra: btn class was changed to fit in the same line in the table, this gave me a lot of trouble 
			content was changed, to represent my podcast starting in a few weeks.
			font was customly changed using font squirl
	-->
    <meta charset="utf-8">
	<link rel="stylesheet" href="../_crud/css/prog2.css" />
    <link   href="../_crud/css/bootstrap.min.css" rel="stylesheet">
	<link   href="http://csis.svsu.edu/~ntbemiss/cis255/ntbemiss/_crud/css/bootstrap.min.css" rel="stylesheet">

    <script src="js/bootstrap.min.js"></script>
	
	<style>
		body {
			background-color: linen;
		}
		
		h1 {
			color: blue;
		} 
	</style>
</head>

<body>
    <div class="container">
    		<div class="row">
    			<h1 style="margin-left:30px;">CIS 255 Email List</h1>
                <p>The purpose of this list is to provide a back end to test front end stuff.</p>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success">Create</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Name</th>
		                  <th>Email Address</th>
		                  <th>Mobile Number</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM customers ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['name'] . '</td>';
							   	echo '<td>'. $row['email'] . '</td>';
							   	echo '<td>'. $row['mobile'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="read.php?id='.
								   $row['id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" 
								   href="update.php?id='.$row['id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" 
								   href="delete.php?id='.$row['id'].'">Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
				<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-success">Tutorial</a>
    	</div>
    </div> <!-- /container -->
  </body>
  
p {
color:green;
}			
	}
</html>
