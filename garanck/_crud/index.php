<!DOCTYPE html>

<!-- File: index.php -->
<!-- Author: Garret Ranck -->
<!-- Description: Basic CRUD applcation where a table of users can be added, updated
deleted, and read.  -->
<!-- Design:
<!-- 1. Relative addressing 2. Internal CSS 3. Inline CSS 4. Added image -->
<!-- Glyphicons would not print for me. I tried everything I could think (mocing .png files out and changing css,
changing permissions to 777 on those png files) but the only
thing that worked was directly importing the css from the site, but that 
messed up the rest of my code due to inheritance from the other external css.-->

<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet"> <!-- 1. Relative addressing -->
    <script src="js/bootstrap.min.js"></script>
	<link rel='icon' href='../svsu.jpg' type='image/jpg'/>
	
			<title>Garret Ranck Crud Index</title>
	<style>
	<!--2. Internal CSS -->
		#svsu {border:solid;border-color:white;}
		body{background-color: black}
		div h3{color: orange} <!--header to orange-->
		div p {color: blue}		<!--p tags in div to blue-->
		h3 {
			border-style: solid;
			border-color: black;
			}
		th,tr {color: black}
		.lead {color:orange;}
		

	</style>
</head>

<body>

    <div class="container">	<!--main bootstrap element -->
	<!-- 4. Added Image -->
	<img id="svsu" height="200" width="200"src="svsu.jpg" class="img-rounded" class="img-responsive" align="right"> <!-- image with cat1 id  and rounded and responsive class for different screens -->
		
		<div class="jumbotron"> <!--creates a line under element on top of page -->
			<h1 style="color:orange" align="center">CIS 255 Email List</h1> <!-- 3. Inline CSS -->
			</div>
    		<div class="row">
    			<div class="text-center"> <!-- centers text in the div-->
                <p class="lead">Program 02 - Demonstrating CSS knowledge through a CRUD application</p> <!-- inline css, lead makes p stand out -->
    		</div>
			<div class="row">
				<div class="col-sm-3"> <!-- 4 columns on page -->
					<p>
						<a href="create.php" class=" btn btn-success glyphicon glyphicon-plus">Create</a>
					</p>
				<div class="table-responsive"> <!-- The table will then scroll horizontally on small devices (under 768px) -->
					<table class="table table-bordered table-hover" style="background-color:white"> <!-- obvious table with a border-->
						<thead>
							<tr>
							<th style="border:solid">Name</th>
							<th style="border:solid">Email Address</th>
							<th style="border:solid">Mobile Number</th>
							<th style="border:solid">Action</th> <!-- 4 individual inline css lines-->
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
			</div>
			<div class="panel panel-default">
					<div class="panel-body">
						<!-- button will display text when hovering -->
						<a href="http://www.garretranck.com" class="btn btn-success glyphicon glyphicon-email" data-toggle="tooltip" title="Link to my personal site"> My Site</a>
					</div>
				</div>
			</div>
		</div>
    </div> <!-- /container -->
  </body>
</html>
