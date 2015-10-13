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
	<title>Create Customer</title>
	
    <meta charset="utf-8">
	<link rel="stylesheet" href="..\my.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="navbar">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="navbar navbar">
			<div class="navbar-nav navbar-left">
				<a class="navbar-brand" href="index.php"><img src="Gaming Central Heading.jpg" class="img-rounded"></a>
			</div>
		<div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php">Home</a></li>
				<li class="active"><a href="create.php">Create</a></li>
				<li><a href="delete.php">Delete</a></li>
				<li><a href="update.php">Update</a></li>
				<li><a href="read.php">Read</a></li>
			</ul>
		</div>
		</div>
	</nav>
	</div>
	
    <div class="container">
	
			<div style="text-align: center" class="well">
						<h3>Use the Input Boxes to create a new user!</h3>
			</div>
			
			<div class="alert alert-info">
					<strong>Info!</strong> Make sure you don't leave any of the boxes blank!
			</div>
    				
		    		  		
	    			<form class="form-horizontal" role="form-horizontal" action="create.php" method="post">
					  <div class="form-group <?php echo !empty($nameError)?'error':'';?>">
					    <div class="controls">
							<label class="control-label col-sm-4">Name:</label>
					      	<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="form-group <?php echo !empty($emailError)?'error':'';?>">
					    <div class="controls">
							<label class="control-label col-sm-4">Email Address:</label>
					      	<input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
					      	<?php if (!empty($emailError)): ?>
					      		<span class="help-inline"><?php echo $emailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-group <?php echo !empty($mobileError)?'error':'';?>">
					    <div class="controls">
							<label class="control-label col-sm-4">Mobile Number:</label>
					      	<input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
					      	<?php if (!empty($mobileError)): ?>
					      		<span class="help-inline"><?php echo $mobileError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions col-sm-offset-4">
						  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Create</button>
						  <a href="index.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
						</div>
					</form>
				
				
    </div> <!-- /container -->
  </body>
</html>