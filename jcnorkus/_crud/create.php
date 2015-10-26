<?php 
	
	require 'database.php';
	//require (__DIR__.'/../_crud01/database.php');

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
    <!--<link   href="css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- 1. an example of relative referencing -->
	<link rel ="stylesheet" type="text/css" href="../jcnorkus_prog02.css"/>
	<!-- adds the cardinal logo to the image in the tab on the browser -->
	<link rel='icon' href='cardinal.png' type='image/png' />
    <!-- <script src="js/bootstrap.min.js"></script> -->
	<style>
	.control-label{
		font-size; 18px; !important		
		<!-- uses the !important attribute to over ride the css style sheet -->
	}
	</style>
</head>

<body>
    <div class="container-fluid">   
	<!-- changed container to fluid to work better with the page if moved -->
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>  Create a Customer</h3>
							<!-- added img to create page -->
							<img class="img_responsive" src="customer.jpg" alt="customer Image" width="150" height="100"/>
		    		</div>
    		
	    			<form class="form-horizontal" action="create.php" method="post">
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label" id = "namelabel">Name</label>
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
					  <div class="form-actions">
						<!-- added glyphicons to both buttons -->
						  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>Create</button>
						  <a class="btn btn-danger" href="index.php"><span class="glyphicon glyphicon-menu-left"></span>Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>