<!-- 
filename: 		delete.php
author:   		Jon Benson, CIS-255, Fall 2015
description: 	Page allowing users to delete entries from table.

design:			
	<head>: 1. Character set
			2. Link to my custom stylesheet
			3. Link to bootstrap stylesheet
			4. Bootstrap JS script
	<body>: 
			1. Header text
			2. Deletion form box
			3. Image box
				i. Image of destructive persons
				
Requested comments included in this document:
3. Relative referencing with ..
5. 3 Bootstrap classes commented

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
	<link href ="../_crud/css/jmbenso2_prog02.css" rel="stylesheet"> <!-- 3. Relative referencing with a .. -->
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
	<!-- Header -->
	<div class = "page-header"> 
		<div class ="text-center"> 
			<h1>CIS 255: Where Dreams Come True</h1>
		</div>
	</div>
	
	<!-- Form -->
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Delete a Customer</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <!-- Bootstrap class alert: eye-catching alert messages -->
					  <!-- Bootstrap class alert-error: big bad red alert message -->
					  <p class="alert alert-error">Are you sure to delete ?</p>
					  <div class="form-actions">
						  <!-- Bootstrap class btn-danger: colors button all red and foreboding -->
						  <button type="submit" class="btn btn-danger"><span class="icon icon-ok"></span>  Yes</button>
						  <a class="btn" href="index.php"><span class="icon icon-remove"></span>  No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
	
	<!-- Image of a destructive person -->
	<div class="container">
		<div class="text-center" style="padding: 25px;">
			<img class="img-circle img-responsive" id="center-image" src="https://c1.staticflickr.com/5/4007/5143180652_3f23fe8d95.jpg" />
		</div>
	</div>
	
  </body>
</html>