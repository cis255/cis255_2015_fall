<!--
filename:    delete.php
author:      Cory Murawske, CIS-255, Fall 2015
design:
	<head>: 1. Charset
			2. Links to stylesheets
			3. Script

	<body>: 1. Container
			2. Banner
			3. Form
			4. Alert Message
			6. Form Action Buttons
			7. Figure
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
		<!-- 3. relative referencing -->
		<link   href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<!-- The bootstrap class container formats the page as a fixed width page layout -->
		<div class="container">
			<!-- The bootstrap class span10 denotes that this div will span 10 out of 12 columns.
			The bootstrap class offset1 denotes that this div will be moved to the right by the value of 1 column -->
			<div class="span10 offset1">
				<!-- The bootstrap class row creates a row on the page in which the table will reside. -->
				<div class="row banner">
					<h3>Delete a Customer</h3>
				</div>
				<!-- The bootstrap class form-horizontal formats the form as a horizontal form 
				(the labels are on the same line as the controls) -->
				<form class="form-horizontal" action="delete.php" method="post">
					<input type="hidden" name="id" value="<?php echo $id;?>"/>
					<!-- The bootstrap class alert formats the text as a basic alert message.
						The bootstrap class alert-error changes the alert message formatting to be a red
					background and text color to warn the user of an error -->
					<p class="alert alert-error">Are you sure you want to delete this record?</p>
					<!-- The bootstrap class form-actions formats the buttons for the form so that they line up with
					the form controls -->
					 
					<div class="form-actions">
						<!-- The bootstrap class btn formats the button as a basic bootstrap button.
							The bootstrap class btn-danger formats the button to be an danger button, meaning that the button is red. 
							The bootstrap class icon-remove supplies the remove glyphicon.  
							The bootstrap class icon-arrow-left supplies the left arrow glyphicon. -->
						<button type="submit" class="btn btn-danger">Yes  <i class="icon-remove"></i></button>
						<a class="btn" href="index.php">No   <i class="icon-arrow-left"></i></a>
					</div>
				</form>
			</div>
			
		</div> <!-- /container -->
		
		<!-- 9. Image added-->
		<div>
			<!-- Inline CSS -->
				<figure style="position:relative;bottom:0px;width:200px;height:100px;margin-left:500px;">
					<img src="../thumbsup.jpg" />
					<figcaption>This website was created by Cory Murawske to showcase Bootstrap, CIS 255, Fall 2015</figcaption>
				</figure>
			</div>
		
	</body>
</html>	