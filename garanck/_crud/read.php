<!-- File: read.php -->
<!-- Author: Garret Ranck -->
<!-- Description: Basic CRUD applcation where a table of users can be added, updated
deleted, and read.  -->
<!-- Design:
<!-- Head : link to .js and .css in all five pages -->
<!--style : various css code to change the look of the page -->
<!-- body : 1) Bootsrap is in a container 2) change the background color of page
			3) Add an image to the bottom    4) Attempt to change the buttons
			5) use of the text-center class 	6) css class selector-->
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
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<style>
		.text-center {color:orange;}
		
	</style>
</head>

<body>
    <div class="container">
		<div class="text-center"> <!-- centers text in the div-->
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
					    <div class="form-actions" style="background-color:black"> <!--background color of form to black -->
						  <a class="btn" href="index.php">Back</a>
					   </div>
					
					 
					</div>
				</div>
			</div>
<img id="svsu" height="500" width="500"src="svsu.jpg" class="img-responsive" align="center" style="border:solid; border-color:orange"> <!-- image with cat1 id  and rounded and responsive class for different screens -->			
    </div> <!-- /container -->
  </body>
</html>