<!DOCTYPE html>
<!--
	Summary of comments:
		-Addd an external CSS file with absolute referencing (line 27)
		-Added classes:
			--"well" to round the look of the container and detach the container from the browser window slightly (line 46)
			--"container-fluid" instead of "container" so that it stretches across the window of the browser window (line 48)
			--"img-responsive" for the image of this page so that images change size based on the screen size (line 52)
			--"glyphicons" for all five buttons on this page (create, read, update, delete, tutorial) (lines 58, 90, 93, 96, 105)
			--"table-condensed" added to "table" class so the cells are more compact (i.e., condensed) (line 63)
			--"table-solid" instead of "table-striped" so each row has the same color as the others (in this case, cyan) (line 63)
		-Non-class items:
			--"id=lead" added to <tr> under <thead> (line 66)
		-Items in php segment:
			--Button "Read" was given "btn-success" so that it is green instead of default (line 90)
			--Button "Update" was given "btn-warning" so that it is yellow-orange instead of green (line 93)
			--Buttons were made "btn-sm" (i.e., turned the buttons into small-sized buttons) (lines 90, 93, 96)
			--Buttons were given apporpriate glyphicons (lines 90, 93, 96)
		-Marked the end of the "well" class (line 108)
-->
<html lang="en">
	<head>
		<meta charset="utf-8"/>
			<!--<link  rel="stylesheet" href="css/bootstrap.min.css"/>-->
			<!-- Used the stylesheet of w3schools so that the glyphicons would work.
				This is absolute referencing of an external CSS file -->
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
			<script src="js/bootstrap.min.js"></script>
		<!-- Internal CSS style -->
		<style>
			body{
				background-color: #F5F5F5
			}
			#lead{
				background-color: orange;
			}
			table{
				background-color: cyan;
			}
		</style>
		<title>CIS 255 Email List</title>
	</head>
	<body>
		<!-- Added "well" class to give a rounded look and grey background to the container
			  along with making the container be detached from the border of the internet browser window -->
		<div class="well"> 
			<!-- Changed "container" to "container-fluid" to stretch it across the browser window -->
			<div class="container-fluid">
				<!-- Added the image for the page. img-responsive changes the size of the picture to match the size of the screen -->
				<a href="index.php"><img class="img-responsive" src="icon-index.jpg" alt="Email list" width="100" height="150"/></a>
				<div class="row">
					<h3>CIS 255 Email List</h3>
					<p>The purpose of this list is to provide a back end to test front end techniques.</p>
				</div>
				<div class="row">
					<p>
						<!-- Added glyphicon to the button "Create" -->
						<a href="create.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Create</a>
					</p>
					<!-- Added "table-condensed" to the table class. This shrinks the empty space in table cells
							making them appear more compact. Changed "table-striped" to
							"table-solid"-->
					<table class="table table-solid table-bordered table-condensed">
						<thead>
							<!-- Added id "lead" to tr -->
							<tr id="lead">
								<th>Name</th>
								<th>Email Address</th>
								<th>Mobile Number</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<!-- In the following php code segment: -->
							<!-- Changed "update" button to be "btn-warning" (line 92) which causes the "update" button to be a yellow-orange color,
								 made "read" button to be "btn-success" (line 89) which causes the "Read" button to be green-->
							<!-- Made all buttons "btn-sm" which causes them all to be small-sized buttons -->
							<!-- Added glyphicons to all buttons -->
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
							   	echo '<a class="btn btn-success btn-sm" href="read.php?id='.
								   $row['id'].'"><span class="glyphicon glyphicon-list-alt"></span> Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-warning btn-sm" 
								   href="update.php?id='.$row['id'].'"><span class="glyphicon glyphicon-pencil"></span> Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger btn-sm" 
								   href="delete.php?id='.$row['id'].'"><span class="glyphicon glyphicon-remove"></span> Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
						</tbody>
					</table>
					<!-- Added glyphicon to the Tutorial button -->
					<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-info"> <span class="glyphicon glyphicon-apple"></span> Tutorial</a>
				</div>
			</div> <!-- /container -->
		</div> <!-- /well -->
	</body>
</html>	