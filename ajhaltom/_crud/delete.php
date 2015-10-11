<!--
filename   : delete.php
author     : Alex Haltom (CIS-255, Fall 2015)
description: This program is a part of _crud. Specifically is used for deleting entries.
design     : 1. Title
			 2. Delete confirmation
			 3. Yes button
			 4. No button
			 5. Background image from internal css
comments   : Comments include description of Bootstrap classes, inline and internal CSS
			
-->
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <link   href="css/bootstrap.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="ajhaltom_prog2style.css"
    <script src="js/bootstrap.min.js"></script>
	
</head>
<style>
body {background-image: url("http://images.alphacoders.com/538/53823.jpg");}
</style>
<body>
    <div class="container">
    
    			<div class="span10 offset1"> <!-- span10: I think this is for spacing -->
    				<div class="row"> <!--  Row: Creates row -->
		    			<h3 style="color: blue;">Delete a Customer</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post"> <!-- form: user input form -->
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/> <!-- Hidden: hides value -->
					  <p class="alert alert-error">Are you sure you want to delete ?</p>
					  <div class="form-actions"> <!-- form-actions: area for options-->
						  <button type="submit" class="btn btn-danger">Yes</button> <!-- btn btn danger: button -->
						  <a class="btn" href="index.php">No</a> <!-- btn: for button with anchor -->
						</div>
					</form>
				</div>

						 		
    </div> <!-- /container -->
  </body>
</html>