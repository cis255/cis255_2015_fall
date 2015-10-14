<!--
filename:   delete.php
author:     bjcobb, CIS-255, Fall 2015
description: Example of using boot strap to style a simple CRUD application
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
<html lang="en"/>
<head>
	<meta charset="utf-8"/>
	<!-- Reletive CSS link -->
	<link   href="../_crud/css/main.css" rel="stylesheet"/>
	<link   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
	<link   href="css/buttons.css" rel="stylesheet"/>
	<!-- Absolute CSS link -->
	<link   href="http://csis.svsu.edu/~bjcobb/cis255/bjcobb/_crud/css/theme.css" rel="stylesheet"/>		
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div id="header" class="row">
				<h3>Delete a Customer</h3>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">Home</a>
					</li>			  
					<li class="active">Delete</li>
				</ol>
			</div>

			<form class="form-horizontal" action="delete.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id;?>"/>
						<p class="alert alert-error">Are you sure to delete ?</p>
						<div class="form-actions">
							<button type="submit" class="btn btn-danger raised round btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Yes</button>
							<a class="btn btn-primary raised round btn-sm" href="index.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>No</a>
						</div>
					</form>
				</div>

			</div>
			<!-- /container -->
		</body>
	</html>