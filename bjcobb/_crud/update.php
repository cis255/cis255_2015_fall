<!--
filename:   update.php
author:     bjcobb, CIS-255, Fall 2015
description: Example of using boot strap to style a simple CRUD application
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
<html lang="en"/>
<head>
	<meta charset="utf-8">
		<!-- Reletive CSS link -->
		<link   href="../_crud/css/main.css" rel="stylesheet"/>
		<link   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
		<link   href="css/buttons.css" rel="stylesheet"/>	
		<!-- Absolute CSS link -->
		<link   href="http://csis.svsu.edu/~bjcobb/cis255/bjcobb/_crud/css/theme.css" rel="stylesheet"/>
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="container">
			<div class="span10 offset1">
				<div id="header" class="row">
					<h3>Update a Customer</h3>
					<ol class="breadcrumb">
						<li>
							<a href="index.php">Home</a>
						</li>			  
						<li class="active">Update</li>
					</ol>
				</div>
				<!-- tell bootstrap this will be a form that is layed out horizontaly this will make control-groups act as rows-->
				<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
						<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
								<label class="control-label">Name</label>
								<div class="controls">
									<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
											<?php if (!empty($nameError)): ?>
											<span class="help-inline">
												<?php echo $nameError;?>
											</span>
											<?php endif; ?>
										</div>
									</div>
									<div class="control-group <?php echo !empty($emailError)?'error':'';?>">
											<label class="control-label">Email Address</label>
											<div class="controls">
												<input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
														<?php if (!empty($emailError)): ?>
														<span class="help-inline">
															<?php echo $emailError;?>
														</span>
														<?php endif;?>
													</div>
												</div>
												<div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
														<label class="control-label">Mobile Number</label>
														<div class="controls">
															<input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
																	<?php if (!empty($mobileError)): ?>
																	<span class="help-inline">
																		<?php echo $mobileError;?>
																	</span>
																	<?php endif;?>
																</div>
															</div>
															<!-- Indent our buttons to line up with the form controls -->
															<div class="form-actions">
																<button type="submit" class="btn btn-success  raised round btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Update</button>
																<a class="btn btn-primary raised round btn-sm" href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</a>
															</div>
														</form>
													</div>

												</div>
												<!-- /container -->
											</body>
										</html>