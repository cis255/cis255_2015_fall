<!--Name: 	Kevin Kargula
	Class:	CIS 255
	Desgin:	Well
				trash image
				"Do you want to delete"
				yes button danger check mark _ no button default X mark
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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
		<!--adds a shaded rounded area around-->
    	<div class="well"
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Delete a Customer</h3>
		    		</div>
					<img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQWHM2EunFsKbIXa33osXRigzPQ19steYs1vsP2DXaHJW14aQeas-L_og"/>
		    		<!--Makes a page to ask whether you really want to delete the object-->
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <p class="alert alert-error">Are you sure to delete ?</p>
					  <div class="form-actions">
						<div class="btn-group">
						  <button type="submit" class="btn btn-danger">
						    <span class="glyphicon glyphicon-trash"/>
							Yes
						  </button>
						  <button class="btn btn-default" href="index.php">
							<span class="glyphicon glyphicon-circle-arrow-left"/>
							No
						  </button>
						</div>
					  </div>
					</form>
				</div>
		</div>				
    </div> <!-- /container -->
  </body>
</html>
