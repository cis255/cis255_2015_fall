<!-- 
filename: 		read.php
author:   		Jon Benson, CIS-255, Fall 2015
description: 	Page allowing users to read entries in table.

design:			
	<head>: 1. Character set
			2. Link to my custom stylesheet
			3. Link to bootstrap stylesheet
			4. Bootstrap JS script
	<body>: 
			1. Header text
			2. Read form box
			3. Image box
				i. Image of reading person
				
Requested comments included in this document:
3. Relative referencing

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
	<link href ="css/jmbenso2_prog02.css" rel="stylesheet"> <!--3. Relative referencing -->
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
	<!-- header -->
	<div class = "page-header"> 
		<div class ="text-center"> 
			<h1>CIS 255: Where Dreams Come True</h1>
		</div>
	</div>
	
	<!-- form -->
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Read a Customer</h3>
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
						  <a class="btn" href="index.php"><span class="icon icon-ok"></span>  Back</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
	
	<!-- Image of a reading person -->
	<div class="container">
		<div class="text-center" style="padding: 25px;">
			<img class="img-circle img-responsive" id="center-image" src="http://static.guim.co.uk/sys-images/Books/Pix/pictures/2011/2/22/1298396381690/Adam-Nicolson-tackling-th-007.jpg" />
		</div>
	</div>
	
  </body>
</html>