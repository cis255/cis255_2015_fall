<!-- File: delete.php -->
<!-- Author: Garret Ranck -->
<!-- Description: Basic CRUD applcation where a table of users can be added, updated
deleted, and read.  -->
<!-- Design:
<!-- Head : link to .js and .css in all five pages -->
<!--style : various css code to change the look of the page -->
<!-- body : 1) Bootsrap is in a container 2) change the background color of page
			3) Add an image to the bottom    4) Attempt to change the buttons
			5) use of the text-center class 	6) uses important tag-->

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
    <script src="js/bootstrap.min.js"></script>
	<style>
	body {background-color:black !important;) <!-- will always be white background, highest specificity -->
	</style>
</head>

<body style="background-color:black">
    <div class="container">
		<div class="text-center"> <!-- centers text in the div-->
    			<div class="col-sm-2"> <!-- adds 12/2 sm columns -->
    				<div class="row">
		    			<h3 style="color:white; border:solid; border-color:white"">Delete a Customer</h3>
				<!-- I use specificity here by using inline CSS to trump external -->		
				
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <p class="alert alert-error">Are you sure to delete ?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger glyphicon glyphicon-plus">Yes</button>
						  <a class="btn" href="index.php">No</a>
						</div>
					</form>
				</div>
			<div class="col-sm-2"> <!-- adds 12/2 sm columns -->
				<img id="svsu" height="500" width="500"src="svsu.jpg" class="img-rounded" style="position: fixed;border:dotted;border-color:white">
			</div>
		</div>	
    </div> <!-- /container -->
  </body>
</html>