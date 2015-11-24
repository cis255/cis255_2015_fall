<!--
Filename	: 	delete.php
Author		: 	Imran Khan, CIS-255, Fall 2015
Description	: 	This php program deletes a user in the database
Design		: 	The program deletes the record in the database for that specific user.
	<head>: Contains the .js and .css files
	<body>: 1. The header notifies you asking if you are sure you would like to delete
			2. The yes button will commit the action and remove them from the database
			3. The No button will redirect you to index.php
-->
<?php 
	require 'database.php';
	$id = 0;
	
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM customers  WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
		header("Location: index.php");
		
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
							<!-- This image will resize based on the size of the screen -->
							<img src="../logo1.png" class="img-responsive pull-right" alt="SVSU Cardinals" style="padding-top:15px" width="200" height="180" align="right" title="SVSU"> 
								<div class="span10 offset1">
									<div class="page-header">
										<h1>Delete a Customer</h1>
										<!-- This nav bar has the links to all the other .php links, and passes the id through as a parameter in update and delete -->
										<ul class="nav nav-tabs">
											<li><a href="index.php">Home</a></li>
											<li><a href="update.php?id=<?php echo $_GET['id']; ?>">Update User</a></li>
												<li><a href="create.php">Create New User</a></li>
												<li><a href="read.php?id=<?php echo $_GET['id']; ?>">Read Current User</a></li>
												</ul>
											</div>

											<form class="well well-sm" action="delete.php" method="post">
												<input type="hidden" name="id" value="<?php echo $id;?>"/>
														<p class="alert alert-error">Are you sure to delete ?</p>
														<div class="well well-sm">
															<button type="submit" class="btn btn-danger glyphicon glyphicon-thumbs-up"> Yes</button>
															<a class="btn glyphicon glyphicon-thumbs-down" href="index.php"> No</a>
														</div>
													</form>
												</div>

											</div> 
											<!-- /container -->
										</body>
									</html>