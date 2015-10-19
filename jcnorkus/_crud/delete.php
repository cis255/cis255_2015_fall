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
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- makes glyphicons work^^^ -->
	<link rel='icon' href='cardinal.png' type='image/png' />
	<!-- adds the cardinal logo to the image in the tab on the browser -->
	<style>
		p:first-child {
		color: red;
		font-size: 24px;
		background-color: pink;
		}
		
		div p{
		background-color: orange;
		<!-- p:first-child gives it a specificity of 2 over the div p with specificity 1 -->			
		}
	
	</style>
</head>

<body>
    <div class="container-fluid">
	<!-- changed container to fluid to work better with the page if moved -->
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<p>Delete a Customer</p>
						<!-- added img to delete -->
						<img class="img_responsive" src="delete.png" alt="delete Image" width="150" height="100"/>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <!-- added div to p to show specificity -->
					  <div>
					  <p class="alert alert-error">Are you sure to delete ?</p>
					  </div>
					  <div class="form-actions">
							<!-- changed button colors and added glyphs -->
						  <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Yes</button>
						  <a class="btn btn-success" href="index.php"><span class="glyphicon glyphicon-menu-left"></span>No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>