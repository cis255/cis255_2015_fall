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
<!-- Here is a link to the newest version of bootstrap-->
			<link   href="css/bstrap.css" rel="stylesheet">
			<!-- Here is a link to my personally developed css-->
				<link   href="css/drdarlin_prog02.css" rel="stylesheet">
					<!-- Here is a link to the bootstrap that you supplied to us-->				
					<script src="js/bootstrap.min.js"/>
				</head>
				<style>
<!-- this styling is for the image. I wanted the picture to be in the top right so I put it 
     in a figure and gave it an absolute position so it is static-->
figure {position:absolute;
		top: 10px;
left:1050px;
z-index: -1;}
				</style>
				<body>
					<div class="container">
						<figure>
						<!-- inserting a picture -->
							<img  src="img/snowPlow.jpg" width="200" height="100">
						</figure>
						<!-- new section -->
						<div class="span10 offset1">
							<form class="form-horizontal" action="delete.php" method="post">
							<input type="hidden" name="id" value="<?php echo $id;?>"/>
							<!-- main header -->
								<p class="alert alert-error">Are you sure to delete?</p>
									<div>
										<!-- buttons with styling from drdarlin_prog02.css -->
										<button type="submit" class="btn btn-danger">
											<span class="glyphicon glyphicon-check"/>
										</button>
										<a class="btn-back" href="index.php">
											<span class="glyphicon glyphicon-ban-circle"/>
										</a>
									</div>
							</form>
						</div>
					</div>
				</body>
</html>