<!-- 
filename: 		create.php
author:   		Jon Benson, CIS-255, Fall 2015
description: 	Page allowing users to add entries to table.

design:			
	<head>: 1. Character set
			2. Link to my custom stylesheet
			3. Link to bootstrap stylesheet
			4. Bootstrap JS script
	<body>: 
			1. Header text
			2. Creation form box
			3. Image box
				i. Image of creative person
				
Requested comments included in this document:
3. Absolute referencing
5. 7 Bootstrap classes commented

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
	<link href ="http://csis.svsu.edu/~jmbenso2/cis255/jmbenso2/_crud/css/jmbenso2_prog02.css" rel="stylesheet"> <!-- 3. Absolute referencing -->
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
	<!-- Header -->
	<div class = "page-header">
		<div class ="text-center">
			<h1>CIS 255: Where Dreams Come True</h1>
		</div>
	</div>

	<!-- Create customer form -->
    <div class="container">
    
    			<div class="span10 offset1"> 
    				<div class="row">
		    			<h3>Create a Customer</h3>
		    		</div>
    		
					<!-- Bootstrap class form-horizontal: each input control is on its own line, with its label -->
	    			<form class="form-horizontal" action="create.php" method="post"> 
						<!-- Bootstrap class control-group: control/label elements grouped together, for optimum spacing -->
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
						<!-- Bootstrap class control-label: formats labels for controls -->
					    <label class="control-label">Name</label>
						<!-- Bootstrap class controls: formats controls -->
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
					  <!-- Bootstrap class form-actions: groups together possible choices -->
					  <div class="form-actions">
						  <!-- Bootstrap class btn: formats buttons -->
						  <!-- Bootstrap class btn-success: colors a button green and happy-like -->
						  <button type="submit" class="btn btn-success"><span class="icon icon-ok"></span>  Create</button>
						  <a class="btn" href="index.php"><span class="icon icon-remove"></span>  Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
	
	<!-- Image of a creative person -->
	<div class="container">
		<div class="text-center">
			<img class="img-circle img-responsive" id="center-image" src="http://blogs-images.forbes.com/allbusiness/files/2014/12/Fotolia_74087814_Subscription_Monthly_M.jpg" />
		</div>
	</div>
  </body>
</html>