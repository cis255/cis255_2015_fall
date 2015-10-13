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
	<title>Read Customer</title>
	
    <meta charset="utf-8">
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
				<li><a href="create.php">Create</a></li>
				<li><a href="delete.php">Delete</a></li>
				<li><a href="update.php">Update</a></li>
				<li class="active"><a href="read.php">Read</a></li>
			</ul>
		</div>
		</div>
	</nav>
	</div>
	
    <div class="container">
			<div style="text-align: center" class="well">
						<h3>Here is the customer's information!</h3>
			</div>
    
    			<div class="span10 offset1">
    				<div class="row">
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="form-group">
						<label class="control-label col-sm-5"><span class="text-info">Name:</span></label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['name'];?>
						    </label>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-5"><span class="text-info">Email Address:</span></label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['email'];?>
						    </label>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-5"><span class="text-info">Mobile Number:</span></label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['mobile'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions col-sm-offset-5">
						  <a href="index.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>