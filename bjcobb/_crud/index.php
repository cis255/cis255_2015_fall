<!--
filename:   index.php
author:     bjcobb, CIS-255, Fall 2015
description: Example of using boot strap to style a simple CRUD application
			-->

<!DOCTYPE html>
<html lang="en"/>
<head>
	<meta charset="utf-8">

		<style>
			body {
				background: #ffffff !important;
			}
		</style>
		<link   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
		<!-- Reletive CSS link -->
		<link   href="../_crud/css/buttons.css" rel="stylesheet"/>	
		<!-- Absolute CSS link
			Our theme.css will overwrite any other css bootstrap uses due to location.
		-->
		<link   href="http://csis.svsu.edu/~bjcobb/cis255/bjcobb/_crud/css/theme.css" rel="stylesheet"/>
		<script src="js/bootstrap.min.js"/>
	</script>
</head>

<body>
	<!-- Elements styled with bootstrap should be in a container -->
	<div class="container">
		<!-- This tells bootstrap we want this all to be in one row -->
		<div id="header" class="row">
			<h3>CIS 255 Email List</h3>
			<!-- format our list as a breadcrumb trail. Bootstrap will use CSS (::before) to add / as needed -->
			<ol class="breadcrumb">
				<!-- Active will tell bootstrap this is the breadcrumb we are currently on-->
				<li class="active">Home</li>			  
			</ol>
			<p>The purpose of this list is to provide a back end to test front end techniques.</p>
		</div>

		<div class="row">
			<p>
				<!-- Create a bootstrap btn, style it as a success button which makes it grean.
					raised round and btn-sm are our styles to override how the button looks-->
				<a href="create.php" class="btn btn-success raised round btn-sm">
					<!-- glyphicon is used to tell bootstrap we want to use a glpy, glyphicon-plus tells it what icon we want to use -->
					<span class="glyphicon glyphicon-plus" aria-hidden="true"/>Create</a>
			</p>
			<!--table tells bootstrap that we are going to use a table. Table-striped tells it to make every other
row a different color and table-bordered applies a border to it. -->
			<table class="table table-striped table-bordered">
				<thead>
					<tr bgcolor="#FFFACD">
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
							   	echo '<td width=300>';
							   	echo '<a class="btn btn-primary outline btn-sm" href="read.php?id='.
								   $row['id'].'"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"/>Read</a>';
							   	echo '&nbsp;';								
							   	echo '<a class="btn btn-success outline btn-sm" 
								   href="update.php?id='.$row['id'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/>Update</a>';
							   	echo '&nbsp;';
								/*
									btn-danager colors our button red
								*/
							   	echo '<a class="btn btn-danger outline btn-sm" 
								   href="delete.php?id='.$row['id'].'"><span class="glyphicon glyphicon-remove" aria-hidden="true"/>Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				</tbody>
			</table>
			<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-success raised round btn-sm">
				<span class="glyphicon glyphicon-info-sign" aria-hidden="true"/>Tutorial</a>
		</div>
	</div>
	<!-- /container -->
</body>
</html>
