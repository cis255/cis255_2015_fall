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
				<link rel="stylesheet" href="../crud/css/prog2.css">
					<script src="js/bootstrap.min.js"/>
				</head>

				<body>
					<div class="container">

						<div class="span10 offset1">
							<div class="row">
								<h3>Delete an Alien</h3>
							</div>

							<form class="form-horizontal" action="delete.php" method="post">
								<input type="hidden" name="id" value="<?php echo $id;?>"/>
										<p class="alert alert-error">Are you sure to delete ?</p>
										<div class="form-actions">
											<button type="submit" class="btn btn-danger">Yes</button>
											<a class="btn" href="index.php">No</a>
										</div>
									</form>
								</div>

							</div>
							<!-- /container -->
							<img src="https://pbs.twimg.com/profile_images/1835472348/html5-logo-1_normal.jpg"/>
							<!--9.3 image -->
						</body>
					</html>