<!DOCTYPE html>
<!--
Filename	: 	read.php
Author		: 	Imran Khan, CIS-255, Fall 2015
Description	: 	This php program prints out the information (name, email, and phone) for the specific user selected after pressing the read button.
Design		: The program is allows you to read the information for that user, and also update if you choose to update.
	<head>: Contains the .js and .css files
	<body>: 1. All elements are contained inside of a container
			4. The information for the current user is printed
			5. The update button redirects you to update.php where you can update that user.
			6. The back button redirects you to index.php
-->
<?php 
	require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM customers where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link   href="css/bootstrap.min.css" rel="stylesheet">
				<script src="js/bootstrap.min.js"></script>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
					<link   href="../background.css"" rel="stylesheet"> 
						<!-- #3 Used .. When references an external css -->
					</head>
					<body>
						<div class="container">
							<!-- This image will resize based on the size of the screen and pull to right of screen -->
							<img src="../logo1.png" class="img-responsive pull-right" alt="SVSU Cardinals" align="right" title="SVSU" id="read">
								<div class="span10 offset1">
									<!-- added the h2 inside of a container-fluid and also used in-line style -->
									<div class="container-fluid" style="background-color:#F44336;color:#fff;height:100px;">
										<h1 align="center">User Info - Read Only</h1>
										<p align="center">This is a general view of this user.</p>
									</div>
									<ul class="nav nav-tabs">
										<li><a href="index.php">Home</a></li>
										<li><a href="update.php?id=<?php echo $_GET['id']; ?>">Update User</a></li>
											<li><a href="create.php">Create New User</a></li>
											<li><a href="delete.php?id=<?php echo $_GET['id']; ?>">Delete Current User</a></li>
											</ul>
											<br>					
												<div class="form-horizontal " >
													<!-- bg-info will make the background for that div a light blue -->
													<div class="control-group bg-info">
														<label class="control-label success">Name</label>
														<div class="controls">
															<label class="checkbox">
																<?php echo $data['name'];?>
															</label>
														</div>
													</div
														<!-- bg-info will make the background for that div a light green -->
														<div class="control-group bg-success">
															<label class="control-label">Email Address</label>
															<div class="controls">
																<label class="checkbox">
																	<?php echo $data['email'];?>
																</label>
															</div>
														</div>
														<!-- bg-info will make the background for that div a cream color -->
														<div class="control-group bg-warning">
															<label class="control-label">Mobile Number</label>
															<div class="controls">
																<label class="checkbox">
																	<?php echo $data['mobile'];?>
																</label>
															</div>
														</div>
														<div class="well well-sm bg-info">
															<!-- This is a medium sized button and will redirect the user to their own page to update their information -->
															<a class="btn btn btn-md btn-success glyphicon glyphicon-refresh" href="update.php?id=<?php echo $_GET['id']; ?>">Update </a>	
																<!-- This is a small sized button -->
																<a class="btn btn btn-sm glyphicon glyphicon-arrow-left btn" href="index.php"> Back</a>
															</div>


														</div>
													</div>

												</div> 
												<!-- /container -->
											</body>
										</html>