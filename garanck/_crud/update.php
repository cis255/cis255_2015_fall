<!-- File: update.php -->
<!-- Author: Garret Ranck -->
<!-- Description: Basic CRUD applcation where a table of users can be added, updated
deleted, and read.  -->
<!-- Design:
<!-- Head : link to .js and .css in all five pages -->
<!--style : various css code to change the look of the page -->
<!-- body : 1) Bootsrap is in a container 2) change the background color of page
			3) Add an image to the bottom    4) Attempt to change the buttons
			5) use of the text-center class 	6) uses important tag-->
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
    <script src="js/bootstrap.min.js"></script>
	<style>
		body{background-color:white;}
		h3{color: orange;}
		#cssimg {border:solid;}
	</style>
</head>

<body>
    <div class="container">
		<div class="text-center"> <!-- centers text in the div-->
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Update a Customer</h3>
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
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success glyphicon glyphicon-plus">Update</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				<img id="cssimg" height="400" width="400"src="data:image/jpeg;base64,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" class="img-circle"> <!--absoluate addressing-->
			</div>
	</div> <!-- /container -->
  </body>
</html>