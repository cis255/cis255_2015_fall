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
		<meta charset="utf-8"/>
		<link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
		<script src="js/bootstrap.min.js"></script>
		<!-- Copied CSS from read.php, removed pseudo selector items, added red border to form-horizontal -->
		<!-- Added a solid red border in form-horizontal to emphasize the fact that this page deletes listings -->
		<style>
			body{
				background-color: #F5F5F5;
				position: relative;
				top: 30px;
			}
			.row{
				position: relative;
				left: 20px;
			}
			.form-horizontal{
				border: 5px solid #DD0000;
			}
			.form-actions{
				padding-left: 30px !important;
				margin-bottom: 0px !important;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="span10 offset1">
				<div class="row">
					<!-- Added image -->
					<a href="index.php"><img src="icon-delete.jpg" alt="Delete listing" width="100" height="150"/></a>
					<!-- Changed "Customer" to "Listing" -->
					<h3>Delete a Listing</h3>
				</div>
				<form class="form-horizontal" action="delete.php" method="post">
					<input type="hidden" name="id" value="<?php echo $id;?>"/>
							<!-- Modified the message here so that it looks more correct -->
							<p class="alert alert-error">Are you sure you want to delete this listing?</p>
							<div class="form-actions">
								<!-- Added glyphicons -->
								<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-alert"></span> Yes</button>
								<a class="btn btn-info" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> No</a>
							</div>
						</form>
					</div>
				</div> <!-- /container -->
			</body>
		</html>