<!--
	Filename: index.php
	Author: George Corser, CIS-255, Fall 2015. With edits from Grant Trebilcock
	Description: This page is the index of the second program and contains inline css, bootstrap
				 and other concepts that we were required to use.
	Design: An index page that links to the other pages.
	  <head>: Stylesheets, including the one needed to make glyphicons to work
	  <Body>: Bootstrap containers, buttons, glyphicons and css are used to show the importance of each
			  when applied to a web page.
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<!-- <link   href="css/bootstrap.min.css" rel="stylesheet"> -->
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
				<!--  Changed the stylesheet so that glyphicons would work, using the solution found by Joe, using absolute referencing of an external css file -->
				<script src="js/bootstrap.min.js"></script>
				<style>
					body{
					background-color: green;
					<!--  Changed my background color to green -->
					}
					#header{
					background-color: white;

					}
					table{
					background-color: white;
					}
				</style>
			</head>

			<body>
				<div class="container-fluid">
					<!--  Changed the type of container to container-fluid so it would move when the size changes. -->
					<div class="row">
						<h3>CIS 255 Email List</h3>
						<p>The purpose of this list is to provide a back end to test front end techniques.</p>
						<!-- 3. Adding the image to the page, using inline css to format it. -->
						<img class="img-rounded" src="email.png" alt="List of Emails" width="100" height="100"/>
					</div>
					<div class="row">
						<p>
							<!--  Changed the button to have a glyphicon of a plus. -->
							<a href="create.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Create</a>
						</p>

						<table class="table table-solid table-bordered">
							<!--  Changed the table from table striped to table solid so the background was one color -->
							<thead>
								<tr id ="header">
									<!-- Used my element selector to change the header to white. -->
									<th>Name</th>
									<th>Email Address</th>
									<th>Mobile Number</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<!-- Inside the following I did.
							  Changed the glyphicons on all buttons.-->
								<?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM customers ORDER BY id DESC';
					  
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr class=="info">';
							   	echo '<td>'. $row['name'] . '</td>';
							   	echo '<td>'. $row['email'] . '</td>';
							   	echo '<td>'. $row['mobile'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn btn-success btn-sm" href="read.php?id='.
								   $row['id'].'"><span class="glyphicon glyphicon-list-alt"></span> Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-default btn-sm" 
								   href="update.php?id='.$row['id'].'"><span class="glyphicon glyphicon-plus"></span> Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger btn-sm" 
								   href="delete.php?id='.$row['id'].'"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
							</tbody>
						</table>
						<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-success"><span class="glyphicon glyphicon-education"></span> Tutorial</a>
					</div>
				</div> <!-- /container -->
			</body>
		</html>
		