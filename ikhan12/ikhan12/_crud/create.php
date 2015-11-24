<!--
Filename: 		create.php
Author: 		Imran Khan, CIS-255, Fall 2015
Description: 	This php program creates a new user in the database
Design: The program stores the user-input data in the database for a new user.
	<head>: Contains the .js and .css files
	<body>: 1. There is a textbox for name, email, and phone
			2. You will receive an error if any fields are left blank and you try to update.
			3. The create button will add the user into the database, which will be reflected in index.php
-->
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

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link   href="css/bootstrap.min.css" rel="stylesheet">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
					<link   href="../background.css"" rel="stylesheet"> 
						<!-- #3 Used .. When references an external css -->

						<script src="js/bootstrap.min.js"></script>
					</head>

					<body>
						<div class="container">
							<!-- This image will vary based on the broweser screen. -->
							<img src="../logo1.png" class="img-responsive pull-right" alt="SVSU Cardinals" width="200" height="180" align="center">
								<div class="span10 offset1">
									<div class="page-header">
										<h1>Create a Customer</h1>
									</div>

									<form class="form-horizontal" action="create.php" method="post">
										<div class="control-group ">
											<label class="control-label">Name</label>
											<div class="controls">
												<input name="name" type="text"  placeholder="Name" value="">
												</div>
											</div>
											<div class="control-group ">
												<label class="control-label">Email Address</label>
												<div class="controls">
													<input name="email" type="text" placeholder="Email Address" value="">
													</div>
												</div>
												<div class="control-group ">
													<label class="control-label">Mobile Number</label>
													<div class="controls">
														<input name="mobile" type="text"  placeholder="Mobile Number" value="">
														</div>
													</div>
													<!-- The well is a sort of container that holds other elements in it. The small attribute makes it a smaller version -->
													<div class="well well-sm">
														<button type="submit" class="btn btn-success glyphicon glyphicon-plus">Create</button>
														<a class="btn glyphicon glyphicon-arrow-left btn" href="index.php"> Back</a>
													</div>
												</form>
											</div>

										</div> 
										<!-- /container -->
									</body>
								</html>