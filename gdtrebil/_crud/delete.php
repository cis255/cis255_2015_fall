<?php 
	require 'database.php';
	$id = 0;
	
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM customers  WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
		header("Location: index.php");
		
	} 
?>
<!--
	Filename: delete.php
	Author: George Corser, CIS-255, Fall 2015. With edits from Grant Trebilcock
	Description: This page is the delete item page from the second program and contains inline css, bootstrap
				 and other concepts that we were required to use.
	Design: A delete item page that removes items from the index.
	  <head>: Stylesheets, including the one needed to make glyphicons to work, as well as psuedoselectors to demonstrate my understanding of that.
	  <Body>: Bootstrap containers, buttons, glyphicons and css are used to show the importance of each
			  when applied to a web page. Also shows specificity and my understanding of it.
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link   href="css/bootstrap.min.css" rel="stylesheet">
				<script src="js/bootstrap.min.js"></script>
				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
					<!-- this stylesheet is needed for glyphicons to work. I also left the other one in so that it would be formatted nicely. -->
					<!-- added a psuedo-selector so that the first p is blue and larger font -->
					<style>
					
						p:first-child {
						color: blue;
						font-size: 24px;
						background-color: grey;
						} 
						div p{
						background-color: green;
						<!-- This is my example of specificity, since p:first-child has a specificity of 2 where div p has a specificity of 1 so the green background is overwritten -->
						}
					</style>
				</head>

				<body>
					<div class="container" class="well"	>
						<!-- added the class well here to make the format nicer. -->
						<div class="span10 offset1" >
							<div class="row" >
								<p>Delete a Customer</p>
								<!--changed this to p instead of h3 to get the psuedo-selector to work. -->
								<!-- Added an image of a shredder to represent deleting items. -->
								<img class="img-responsive" class ="shred" src="shredder.png" alt="A shredder" width="100" height="100"/>
							</div>

							<form class="form-horizontal" action="delete.php" method="post">
								<input type="hidden" name="id" value="<?php echo $id;?>"/>
										<div>
										<!-- put the class inside another div so that it would work with the div p styling -->
											<p class="alert alert-error">Are you sure to delete ?</p> 
										</div>
										<div class="form-actions">
											<button type="submit" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-trash"></span> Yes</button>
											<!-- Changed the btn from button default to btn danger and the sizes to btn large -->
											<a class="btn btn-success btn-lg" class="button" "href="index.php"><span class="glyphicon glyphicon-remove"></span> No</a>
										</div>
									</form>
								</div>

							</div> <!-- /container and well -->
						</body>
					</html>