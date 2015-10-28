<!--
filename:    delete.php
author:      Tessa Genovese, CIS-255, Fall 2015
description: This file displays a web page to delete an entry in the email list.
design: The file creates a webpage where the user can delete an entry from the email list.
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
		<link 	href="css/tfgenove_bootstrap.css" rel="stylesheet">   <!-- added by the author -->
		<script src="js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<!-- The bootstrap class container formats the page as a fixed width page layout -->
		<div class="container">
			<!-- The bootstrap class span10 denotes that this div will span 10 out of 12 columns.
			The bootstrap class offset1 denotes that this div will be moved to the right by the value of 1 column -->
			<div class="span10 offset1">
				<!-- The bootstrap class row creates a row on the page in which the table will reside.
				The class banner is a CSS class defined by the author. -->
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
					<p class="alert alert-error">Are you sure you want to delete ?</p>
					<!-- The bootstrap class form-actions formats the buttons for the form so that they line up with
					the form controls -->
					<!-- The glyphicons on the buttons and the change to btn-info for the Yes button were added by
					the author -->
					<div class="form-actions">
						<!-- The bootstrap class btn formats the button as a basic bootstrap button.
							The bootstrap class btn-info formats the button to be an info button, meaning that the button is light blue. 
							The bootstrap class icon-remove supplies the remove glyphicon.  
							The class icon-red was added by the author.
							The bootstrap class icon-arrow-left supplies the left arrow glyphicon.
						The class icon-blue was added by the author -->
						<button type="submit" class="btn btn-info">Yes  <i class="icon-remove icon-red"></i></button>
						<a class="btn" href="index.php">No   <i class="icon-arrow-left icon-blue"></i></a>
					</div>
				</form>
			</div>
			
		</div> <!-- /container -->
		
		<!-- 9. Image added by the author -->
		<div>
			<!-- Inline CSS -->
			<figure style="position:fixed;bottom:0px;width:100%;margin-left:5px;">
				<img src="../red_white_footer.png" />
				<figcaption>Website Design by Tessa Genovese, CIS 255, Fall 2015</figcaption>
			</figure>
		</div>
		
	</body>
</html>	