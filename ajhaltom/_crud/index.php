<!--
filename   : index.php
author     : Alex Haltom (CIS-255, Fall 2015)
description: This program is a part of _crud. Specifically for viewing all entries at the same time.
design     : 1. Title
			 2. _crud view
			 3. Background image from external css with !important attribute!
comments   : Comments include description of Bootstrap classes, inline and internal CSS, referencing examples
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <link   href="css/bootstrap.min.css" rel="stylesheet"> -->
	<!-- 3. Example of absolute referencing --> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- 3. Example of relative referencing -->
	<!-- 4. External CSS) -->
	<link rel="stylesheet" href="../css/ajhaltom_prog2style.css"
    <script src="js/bootstrap.min.js"></script>
</head>
<!-- 4. Internal CSS -->
<style>
body {background-image: url("http://images.alphacoders.com/538/53823.jpg");}
</style>
<body>
    <div class="container"> <!-- Container: Coding is done inside container in order to receive bootstrap -->
    		<div class="row">
    			<!-- 4. Example of inline --><h3 style="color: blue;">CIS 255 Email List</h3>
                <p>The purpose of this list is to provide a back end to test front end techniques.</p>
    		</div>
			<div class="row"> <!-- Row: Creates row -->
				<p>
					<a href="create.php" class="btn btn-success">Create</a> <!-- btb btn-success: Creates clickable button -->
				</p>
				
				<table class="table table-striped table-bordered"> <!-- table: creates table -->
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
</html>
