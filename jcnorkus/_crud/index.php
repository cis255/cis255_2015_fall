<!DOCTYPE html>
<!--
filename    : index.php
author      : George Corser (CIS-255, Fall 2015), edited by Jacob Norkus
description : Records a list of emails to a database, you can add, delete, update and read the emails entered into the database
design      : Shows the importance of bootstrap and css in concern to webpages.
			: For example, adding pictures, glyphicon, containers, buttons, tables, and forms

Credit      : I was helped by Grant Trebilcock and Joe Olsen with my code and the ideas behind my code.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <link   href="css/bootstrap.min.css" rel="stylesheet"> -->
	<!-- used this stylesheet in order to use glyphicons, this is an example of absolute referencing of an external css file -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
	<!-- adds the cardinal logo to the image in the tab on the browser -->
	<link rel='icon' href='cardinal.png' type='image/png' />
	
	<style>
	body{
		background-color: grey	
	}
	#top{
		background-color: grey
	}
	
	</style>
	
</head>

<body>
<!--well keeps the table off the left side of this page -->
	<div class="well">
		<!-- lets the table move with the size of the window -->
		<div class="container-fluid">
		<!-- added the img to the top of the screen -->
		<img class="img_rounded" src="email.png" alt="Email Image" width="100" height="100"/>
    		<div class="row">
    			<h3>CIS 255 Email List</h3>
                <p>The purpose of this list is to provide a back end to test front end techniques.</p>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Create</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
						<!-- added the id "top" to change the color of the table header -->
		                <tr id = "top">
		                  <th>Name</th>
		                  <th>Email Address</th>
		                  <th>Mobile Number</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
					  <!-- changed btn to btn-info to give the read button some color -->
					  <!-- added glyphicons to buttons -->
					  <!-- added quiz answers button -->
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
							   	echo '<a class="btn btn-info btn-sm" href="read.php?id='.
								   $row['id'].'"><span class="glyphicon glyphicon-align-left"></span> Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success btn-sm" 
								   href="update.php?id='.$row['id'].'"><span class="glyphicon glyphicon-wrench"></span> Update</a>';
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
				<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger"><span class="glyphicon glyphicon-sunglasses"></span> Quiz Answers</a>
    	</div>
		</div> <!-- /container -->
	</div><!-- /well -->
  </body>
</html>
