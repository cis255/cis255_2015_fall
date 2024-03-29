<!--
filename:    read.php
author:      Tessa Genovese, CIS-255, Fall 2015
description: This file displays a web page to read an entry in the email list.
design: The file creates a form from which the user can read the entry in the email list.
	<head>: 1. Charset
			2. Links to stylesheets
			3. Script

	<body>: 1. Container
			2. Banner
			3. Form
			4. Name Control
			5. Email Control
			6. Mobile Number Control
			7. Form Action Buttons
			8. Figure
-->
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
		    			<h3>Read a Customer</h3>
		    		</div>
		    		<!-- The bootstrap class form-horizontal formats the form as a horizontal form 
						 (the labels are on the same line as the controls) -->
	    			<div class="form-horizontal" >
					  <!-- The bootstrap class control-group wraps the labels and controls in a control group -->
					  <div class="control-group">
						<!-- The bootstrap class control-label formats a control label for the form -->
					    <label class="control-label">Name</label>
						<!-- The bootstrap class controls is used to wrap all the associated controls in the form
							 so that they are properly aligned (the labels are on the same line as the control and the
							 labels are right aligned) -->
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['name'];?>
						    </label>
					    </div>
					  </div>
					  <!-- The bootstrap class control-group wraps the labels and controls in a control group -->
					  <div class="control-group">
						<!-- The bootstrap class control-label formats a control label for the form -->
					    <label class="control-label">Email Address</label>
						<!-- The bootstrap class controls is used to wrap all the associated controls in the form
							 so that they are properly aligned (the labels are on the same line as the control and the
							 labels are right aligned) -->
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['email'];?>
						    </label>
					    </div>
					  </div>
					  <!-- The bootstrap class control-group wraps the labels and controls in a control group -->
					  <div class="control-group">
						<!-- The bootstrap class control-label formats a control label for the form -->
					    <label class="control-label">Mobile Number</label>
						<!-- The bootstrap class controls is used to wrap all the associated controls in the form
							 so that they are properly aligned (the labels are on the same line as the control and the
							 labels are right aligned) -->
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['mobile'];?>
						    </label>
					    </div>
					  </div>
					  <!-- The bootstrap class form-actions formats the buttons for the form so that they line up with
					        the form controls -->
					  <!-- The glyphicon on the button was added by the author -->
					    <div class="form-actions">
						  <!-- The bootstrap class btn formats the button as a basic bootstrap button.
							   The bootstrap class icon-arrow-left supplies the left arrow glyphicon.  
							   The class icon-blue was added by the author -->
						  <a class="btn" href="index.php">Back  <i class="icon-arrow-left icon-blue"></i></a>
					   </div>
					
					 
					</div>
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