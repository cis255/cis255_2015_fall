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
	<title>Delete Customer</title>
	
    <meta charset="utf-8">
	<link rel="stylesheet" href="..\my.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="navbar">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="navbar navbar">
			<div class="navbar-nav navbar-left">
				<a class="navbar-brand" href="index.php"><img src="Gaming Central Heading.jpg" class="img-rounded"></a>
			</div>
		<div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php">Home</a></li>
				<li class="active"><a href="create.php">Create</a></li>
				<li><a href="delete.php">Delete</a></li>
				<li><a href="update.php">Update</a></li>
				<li><a href="read.php">Read</a></li>
			</ul>
		</div>
		</div>
	</nav>
	</div>
	

	
    <div class="container">
	
			<div style="text-align: center" class="well">
						<h3>Click "Yes" to delete a customer or "No" to run away!</h3>
			</div>
			
			<div class="alert alert-warning">
					<strong>CAUTION!</strong> Once you delete the customer he/she will be GONE!
			</div>    
    			<div style="text-align: center">
    				<div class="row">
		    			<h2>Delete a Customer</h2>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <h4 class="text-danger">Are you sure you want to delete?<h4>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</button>
						  <a href="index.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-remove"></span> No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>