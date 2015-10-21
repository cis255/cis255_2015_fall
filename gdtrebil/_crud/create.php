<?php 
	
	require 'database.php';

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
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO customers (name,email,mobile) values(?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$email,$mobile));
			Database::disconnect();
			header("Location: index.php");
		}
	}
?>

<!--
	Filename: create.php
	Author: George Corser, CIS-255, Fall 2015. With edits from Grant Trebilcock
	Description: This page is the create an item page of the second program and contains inline css, bootstrap
				 and other concepts that we were required to use.
	Design: An create an item page that creates an item for the index.
	  <head>: External Stylesheets, including the one needed to make glyphicons to work and use of the !important attribute
	  <Body>: Bootstrap containers, buttons, glyphicons and css are used to show the importance of each
			  when applied to a web page.
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<!-- <link   href="css/bootstrap.min.css" rel="stylesheet">
				<script src="js/bootstrap.min.js"></script> -->

			<link rel="stylesheet" type="text/css" href="../gdtrebil_prog02.css"/>
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
				<!-- 100. Used relative referencing of an external css file -->
				<style>

					.control-label{
					font-size: 11px !important;
					}
					<!-- Used the important attribute in with a class selector to overide the css file. -->

				</style>
			</head>

			<body>
				<div class="well">
					<!--  Changed the class to well, so it would be more rounded and have a grey background-->
					<div class="container-fluid">
                    <!-- Changed the container to container fluid again to make it work with different size screens. -->
						<div class="span10 offset1">
							<div class="row">
								<h3>Create a Customer</h3>
								<img class="img-responsive" class ="person" src="person.png" alt="" width="100" height="100"/>
							</div>
								<!-- Added glyphicons to the buttons to represent their functions --> 
							<form class="form-horizontal" action="create.php" method="post">
								<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
										<label class="control-label" id="tag">Name</label>
										<div class="controls">
											<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
													<?php if (!empty($nameError)): ?>
													<span class="help-inline"><?php echo $nameError;?></span>
													<?php endif; ?>
												</div>
											</div>
											<div class="control-group <?php echo !empty($emailError)?'error':'';?>">
													<label class="control-label">Email Address</label>
													<div class="controls">
														<input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
																<?php if (!empty($emailError)): ?>
																<span class="help-inline"><?php echo $emailError;?></span>
																<?php endif;?>
															</input>
														</div>
													</div>
													<div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
															<label class="control-label">Mobile Number</label>
															<div class="controls">
																<input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
																		<?php if (!empty($mobileError)): ?>
																		<span class="help-inline"><?php echo $mobileError;?></span>
																		<?php endif;?>
																	</div>
																</div>
																<div class="form-actions">
																	<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Create</button>
																	<a class="btn btn-danger" href="index.php"><span class="glyphicon glyphicon-triangle-left"></span>Back</a>
																</div>
															</form>
														</div>

													</div> <!-- /container -->
												</div> <!-- well -->
											</body>
										</html>