<!DOCTYPE html>
<!--
Filename: 		index.php
Author: 		Aaron Soave, CIS-255, Fall 2015
Description: 	This php program prints out each user in the database, and will redirect you
				to a page where you can update, remove, or read the user's information. Also, you can create a new user
Design: The program is a menu that allows a user to create, read, update, or delete a user.
	<head>: Contains the .js and .css files
	<body>: 1. All elements are contained inside of a container
			2. The jumbotron is a page header that holds the h1
			3. The create button allows you to add a new user to the database, which will be reflected in the table
			4. The information for each user is printed row by row, and is retrieved from the database
			5. An update, read, and delete button is printed in each row.
			6. The tutorial button redirects you to a guide on _crud
			 
-->
<html lang="en">
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	

</head>

<!-- embedded style to make h1 text red
	 Because the location for this style this appears after the link to the bootstrap.min.css,
	 It will take priority over that of the .css file -->
<style>
	h1{
		color:red !important;
	}
</style>

<body>

    <div class="container">
				<!-- This image will resize based on the size of the screen. Also the pull-right will pull the image to the right of the screen -->
				<img src="../svsu.jpg" class="img-responsive pull-right img-rounded" alt="SVSU Cardinals" width="200" height="200" id="index_image" title="SVSU" >&nbsp&nbsp&nbsp
	<!-- Jumbotron is a type of container that holds elements -->
	<div class="jumbotron">
    <h1 align="center">CIS 255 Email List</h1><br /> 
  </div>

    		<div class="row">
                <p>The purpose of this list is to provide a back end to test front end techniques.</p>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class=" btn btn-success glyphicon glyphicon-plus">Create</a>
				</p>
				<p align="right">
					<!-- This is a badge showing number of customers in table. It is static, however. -->
					<a href="#">Number of users <span class="badge">13</span></a><br>
				<p>
					<!-- table-hover will change the color of the current row that your cursor is on -->
					<table class="table table-striped table-bordered table-hover">
						  <thead>
							<tr class="odd">
							  <th>Name</th>
							  <th>Email Address</th>
							  <th>Mobile Number</th>
							  <th>Action</th>
							</tr>
						  </thead>
						  <tbody>
						 <!-- Changed the order by to order by name -->
						  <?php 
						   include 'database.php';
						   $pdo = Database::connect();
						   $sql = 'SELECT * FROM customers ORDER BY name ASC';
						   foreach ($pdo->query($sql) as $row) {
									echo '<tr>';
									echo '<td>'. $row['name'] . '</td>';
									echo '<td>'. $row['email'] . '</td>';
									echo '<td>'. $row['mobile'] . '</td>';
									echo '<td width=250>';
									echo '<a class="btn" href="read.php?id='.
									   $row['id'].'">Read</a>';
									echo '&nbsp;';
									echo '<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id='.$row['id'].'">Update</a>';
									echo '&nbsp;';
									echo '<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id='.$row['id'].'">Delete</a>';
									echo '</td>';
									echo '</tr>';						
						   }				
						  ?>
						  </tbody>
					</table>
				</div>
				<!-- The panel creates a visual container, that can store elements inside. -->
				<div class="panel panel-default">
					<div class="panel-body">
						<!-- When hovering the button, text will show up next to the button -->
						<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-success glyphicon glyphicon-education" data-toggle="tooltip" title="A tutorial on _crud"> Tutorial</a>
					</div>
				</div>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
