<!--name:	Kevin Kargula
	Class:	CIS 255
	Design:	"Update a Customer"
			picture
			Label Name 	_ text box with previous name
			Label email	_ text box with previous email
			Label mobile	_ text box with prvious mobile phone number
			Label Update success btn _ back dafault btn
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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    			<div class="span10 offset1"><!--Sets the basis for the entire program on the website-->
    				<div class="row">
		    			<h3>Update a Customer</h3>
		    		</div>
					<row>
					  <div class="col-sm-3">
    					<img class="col-sm-9" src="https://bebekdekil.files.wordpress.com/2010/01/change.jpg"/>
					  </div>
					  <div class="col-sm-2">
					    <label class="control-label">Name</label><br/>
					    <label class="control-label">Email Address</label><br/>
					    <label class="control-label">Mobile Number</label>
					  </div>
					<div class="col-sm-3">
	    			<!--Creates a horizontal area -->
					<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <div class="controls">
					      	<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
					    <div class="controls">
					      	<input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
					      	<?php if (!empty($emailError)): ?>
					      		<span class="help-inline"><?php echo $emailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
					    <div class="controls">
					      	<input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
					      	<?php if (!empty($mobileError)): ?>
					      		<span class="help-inline"><?php echo $mobileError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions">
					  	<div class="btn-group">
						  <button type="submit" class="btn btn-success">
							<!--Puts a pencil icon in the button-->
							<span class = "glyphicon glyphicon-pencil"/>
							Update</button>
							<!--Puts a left arrow in the button-->
							<button class="btn btn-default" href="index.php">
                            <span class="glyphicon glyphicon-circle-arrow-left"/>
                            Back </button>
						</div>
					  </div>
					</form>
					</div>
					</row>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>
