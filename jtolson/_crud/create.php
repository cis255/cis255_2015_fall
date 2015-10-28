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
			<!-- <link href="css/bootstrap.min.css" rel="stylesheet"/> -->
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
			<!-- 1. Relative referencing of an external CSS file with .. notation -->
			<link rel="stylesheet" type="text/css" href="../jtolson_prog02.css"/>
			<script src="js/bootstrap.min.js"></script>
			<!-- For the following style tag: -->
				<!-- #nametag:
						Using an ID selector to override the CSS file with !important -->
				<!-- .img-responsive, .form-horizontal, .controls: 
						Class selector used here -->
				<!-- .controls:
						Moves the item bars over -->
			<style>
				#nametag{
					font-size: 16px !important;
					font-weight: bold !important;
				}
				.img-responsive{
					position: relative;
					top: 17px;
					left: 8px;
				}
				.form-horizontal{
					width: 200px !important;
					padding-left: 0px !important;
				}
				
				.controls{
					padding-left: 50px;
				}
			</style>
			<!-- For some reason, having comments inside the style tag messed up the CSS slightly -->
			<title>CIS 255 Email List - Create</title>
		</head>
		<body>
			<div class="container">
				<div class="span10 offset1"> <!--Banner of the form-->
					<div class="row">
						<!-- Added image to the page -->
						<a href="index.php"><img class="img-responsive" src="icon-create.jpg" alt="Create listing" width="100" height="150"/></a>
						<!-- h3 tag has "New Listing" instead of "Customer" now -->
						<h3>Create a New Listing</h3>
					</div>
					<form class="form-horizontal" action="create.php" method="post">
						<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
								<!-- Added ID "nametag" for this label -->
								<label class="control-label" id="nametag">Name</label>
								<div class="controls">
									<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
											<?php if (!empty($nameError)): ?>
											<span class="help-inline"><?php echo $nameError;?></span>
											<?php endif; ?>
										</input>
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
													<input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>"/>
															<?php if (!empty($mobileError)): ?>
															<span class="help-inline"><?php echo $mobileError;?></span>
															<?php endif;?>
														</input>
													</div>
												</div>
												<hr> <!-- hr tag to separate the buttons from the forms -->
												<div class="form-actions">
													<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Create</button>
													<a class="btn btn-info" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
												</div>
											</form>
										</div>
									</div> <!-- /container -->
								</body>
							</html>