<!--
filename   : read.php
author     : Alex Haltom (CIS-255, Fall 2015)
description: This program is a part of _crud. Specifically is for viewing one entry at a time.
design     : 1. Title
			 2. Displays name
			 3. Displays email
			 4. Displays mobile
			 5. Back button
			 6. Background image from internal css
comments   : Comments include description of Bootstrap classes, inline and internal CSS
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- <link   href="css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="js/bootstrap.min.js"></script>
</head>
<style>
body {background-image: url("http://images.alphacoders.com/538/53823.jpg");}
</style>
<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3 style="color: blue;">Read a Customer</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Name</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['name'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Email Address</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['email'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Mobile Number</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['mobile'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <a class="btn" href="index.php">Back</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>