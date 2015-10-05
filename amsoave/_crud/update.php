<!--
Filename: 		update.php
Author: 		Aaron Soave, CIS-255, Fall 2015
Description: 	This php program updates the attributes for that specific user in the database
				based off the values from each textbox
Design: The program updates and stores the user-input data in the database for a current user.
	<head>: Contains the .js and .css files
	<body>: 1. There is a textbox for name, email, and phone.
			2. You will receive an error if any fields are left blank and you try to update.
			3. The update button will update the user information in the database.
			4. The back button redirects you to index.php.
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link   href="../Body.css"" rel="stylesheet"> <!-- #3 Using .. When references an external css -->
    <script src="js/bootstrap.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
				<!-- This image will resize based on the size of the screen -->
				<img src="../svsu.jpg" class="img-responsive pull-right" alt="SVSU Cardinals" width="200" height="200" align="right" title="SVSU">
    			<div class="span10 offset1">
					<!-- Creates a header at the top of the page -->
					<div class="page-header">
						<h1>Update a Customer</h1> 
						<ul class="nav nav-tabs">
							<li><a href="index.php">Home</a></li>
							<li><a href="read.php?id=<?php echo $_GET['id']; ?>">Read Current User</a></li>
							<li><a href="create.php">Create New User</a></li>
							<li><a href="delete.php?id=<?php echo $_GET['id']; ?>">Delete Current User</a></li>
						</ul>
				  </div>   				   		
	    			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Name</label>
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
					  <div class="well well-sm">
						  <!-- Glyphicon adds an image depending on what you put after glyphicon-* -->
						  <button type="submit" class="glyphicon glyphicon-ok btn btn-success"> Update</button>
						  <a class="glyphicon glyphicon-arrow-left btn" href="index.php"> Back</a>
					  </div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>