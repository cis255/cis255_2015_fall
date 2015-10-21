<!--
filename:   read.php
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

<!DOCTYPE html\>
<html lang="en">
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
			<!-- span10 tells bootstrap to use 10 of the 12 columns and offset1 makes it skip the first -->
			<div class="span10 offset1">
				<div id="header" class="row">
					<h3>Read a Customer</h3>
					<ol class="breadcrumb">
						<li>
							<a href="index.php">Home</a>
						</li>			  
						<li class="active">Read</li>
					</ol>
				</div>
				<table class="table table-striped table-bordered">
					<tr>
						<td>
							<!-- Tell bootstrap this is a label to a forum control -->
							<label class="control-label">Name</label>
						</td>
						<td>
							<?php echo $data['name'];?>
						</td>
					</tr>
					<tr>
						<td>
							<label class="control-label">Email Address</label>
						</td>										
						<td>
							<?php echo $data['email'];?>
						</td>
					</tr>
					<tr>
						<td>
							<label class="control-label">Mobile Number</label>
						</td>
						<td>
							<?php echo $data['mobile'];?>
						</td>													
					</tr>
					<tr>
						<td colspan="2" align="center">
							<a class="btn btn-primary raised round btn-sm" href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</a>
						</td>
					</tr>
				</table>					

			</div>
			<!-- /container -->
		</div>
	</body>
</html>