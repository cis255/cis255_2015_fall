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
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- adds the cardinal logo to the image in the tab on the browser -->
	<link rel='icon' href='cardinal.png' type='image/png' />
	<style>
	<!-- this is the class attribute selector, it changes the color of all classes starting with control.
		  this is used to makes changes to everything in a class at once, regardless of how many classes there are-->
	[class|="control"]{
		background-color: black;	
		color: cyan;
	}
	</style>
</head>

<body>
<div class="well">
    <div class="container-fluid">
    <!-- changed container to fluid to work better with the page if moved -->
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Customer Information</h3>
						<img class="img_responsive" src="read.jpg" alt="read Image" width="150" height="100"/>
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
						<!-- made button green, added glyph icon -->
						  <a class="btn btn-success" href="index.php"><span class="glyphicon glyphicon-ok"></span> Back</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
</div> <!-- /well -->
  </body>
</html>