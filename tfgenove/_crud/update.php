<!--
filename:    update.php
author:      Tessa Genovese, CIS-255, Fall 2015
description: This file displays a web page to update an entry in the email list.
design: The file creates a form which the user can use to update the entry in the email list.
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
	}
	
	if ( !empty($_POST)) {
		// keep track validation errors
		$nameError = null;
		$emailError = null;
		$mobileError = null;
		
		// keep track post values
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		
		// validate input
		$valid = true;
		if (empty($name)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}
		
		if (empty($email)) {
			$emailError = 'Please enter Email Address';
			$valid = false;
			} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Please enter a valid Email Address';
			$valid = false;
		}
		
		if (empty($mobile)) {
			$mobileError = 'Please enter Mobile Number';
			$valid = false;
		}
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE customers  set name = ?, email = ?, mobile =? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$email,$mobile,$id));
			Database::disconnect();
			header("Location: index.php");
		}
		} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM customers where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$name = $data['name'];
		$email = $data['email'];
		$mobile = $data['mobile'];
		Database::disconnect();
	}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link   href="css/bootstrap.min.css" rel="stylesheet">
		<!-- 3. absolute referencing -->
		<link 	href="http://csis.svsu.edu/~tfgenove/cis255/tfgenove/_crud/css/tfgenove_bootstrap.css" rel="stylesheet">   <!-- added by the author -->
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
					<h3>Update a Customer</h3>
				</div>
				<!-- The bootstrap class form-horizontal formats the form as a horizontal form 
				(the labels are on the same line as the controls) -->
				<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
					<!-- The bootstrap class control-group wraps the labels and controls in a control group -->
					<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
						<!-- The bootstrap class control-label formats a control label for the form -->
						<label class="control-label">Name</label>
						<!-- The bootstrap class controls is used to wrap all the associated controls in the form
							so that they are properly aligned (the labels are on the same line as the control and the
						labels are right aligned) -->
						<div class="controls">
							<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
							<?php if (!empty($nameError)): ?>
							<span class="help-inline"><?php echo $nameError;?></span>
							<?php endif; ?>
						</div>
					</div>
					<!-- The bootstrap class control-group wraps the labels and controls in a control group -->
					<div class="control-group <?php echo !empty($emailError)?'error':'';?>">
						<!-- The bootstrap class control-label formats a control label for the form -->
						<label class="control-label">Email Address</label>
						<!-- The bootstrap class controls is used to wrap all the associated controls in the form
							so that they are properly aligned (the labels are on the same line as the control and the
						labels are right aligned) -->
						<div class="controls">
							<input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
							<?php if (!empty($emailError)): ?>
							<span class="help-inline"><?php echo $emailError;?></span>
							<?php endif;?>
						</div>
					</div>
					<!-- The bootstrap class control-group wraps the labels and controls in a control group -->
					<div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
						<!-- The bootstrap class control-label formats a control label for the form -->
						<label class="control-label">Mobile Number</label>
						<!-- The bootstrap class controls is used to wrap all the associated controls in the form
							so that they are properly aligned (the labels are on the same line as the control and the
						labels are right aligned) -->
						<div class="controls">
							<input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
							<?php if (!empty($mobileError)): ?>
							<span class="help-inline"><?php echo $mobileError;?></span>
							<?php endif;?>
						</div>
					</div>
					<!-- The bootstrap class form-actions formats the buttons for the form so that they line up with
					the form controls -->
					<!-- The glyphicons on the buttons and the change to btn-info for the Update button were added by
					the author -->
					<div class="form-actions">
						<!-- The bootstrap class btn formats the button as a basic bootstrap button.
							The bootstrap class btn-info formats the button to be an info button, meaning that the button is light blue. 
							The bootstrap class icon-pencil supplies the pencil glyphicon.  
							The class icon-yellow was added by the author.
							The bootstrap class icon-arrow-left supplies the left arrow glyphicon.
						The class icon-blue was added by the author -->
						<button type="submit" class="btn btn-info">Update <i class="icon-pencil icon-yellow"></i></button>
						<a class="btn" href="index.php">Back  <i class="icon-arrow-left icon-blue"></i></a>
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