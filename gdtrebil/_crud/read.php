<?php 
	require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM customers where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>
<!--
	Filename: read.php
	Author: George Corser, CIS-255, Fall 2015. With edits from Grant Trebilcock
	Description: This page is the read item page of the second program and contains inline css, bootstrap
				 and other concepts that we were required to use.
	Design: A page that allows for viewing of an item from an index.
	  <head>: Stylesheets, including the one needed to make glyphicons to work, as well as an attribute selector and my understanding of that.
	  <Body>: Bootstrap containers, buttons, glyphicons and css are used to show the importance of each
			  when applied to a web page.
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link   href="css/bootstrap.min.css" rel="stylesheet">
				<script src="js/bootstrap.min.js"></script>
				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
					<!-- this stylesheet is needed for glyphicons to work. I also left the other one in so that it would be formatted nicely. -->
					<style>
						[class|="control"]{
						background: green;
						color: white;
						}
						<!-- Added an attribute selector so that any class that started with the word "control" so that any class that started with 
					     control would have a green background. -->

					</style>
				</head>

				<body>
					<div class="container-fluid">
						<!-- added container fluid to make it fit the pages better -->
						<div class="span10 offset1">
							<div class="row">
								<h3>Read a Customer</h3>
								<img class="img-rounded" class ="Read" src="read.png" alt="A book" width="100" height="100"/>
								<!-- added an image of a book due to it being read, using img-rounded -->
							</div>

							<div class="form-horizontal" >
								<div class="control-group">
									<label class="control-label" >Name</label> 
									<div class="controls">
										<label class="checkbox">
											<?php echo $data['name'];?>
										</label>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" >Email Address</label>
									<div class="controls">
										<label class="checkbox">
											<?php echo $data['email'];?>
										</label>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" >Mobile Number</label>
									<div class="controls">
										<label class="checkbox">
											<?php echo $data['mobile'];?>
										</label>
									</div>
								</div>
								<div class="form-actions">
									<!-- changed the btn to btn-danger so it would be more visable -->
									<a class="btn btn-danger" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span>Back</a>
								</div>


							</div>
						</div>

					</div> <!-- /container -->
				</body>
			</html>