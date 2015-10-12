

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<style>
	body {background-color:purple !important;) <!-- will always be purple background, highest specificity -->
	</style>
</head>

<body>
    <div class="container">
    
    			<div class="col-sm-3">
    				<div class="row">
		    			<font color = "white"> <h3>Delete a Customer</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="44"/>
					  <p class="alert alert-error">Are you sure you want to delete ?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-primary">Yes</button>
						  <a class="btn btn-warning" href="index.php">No</a>
						</div>
					</form>
				</div>
<!--			<div class="col-sm-3"> -->
<!--				<img id="svsu" height="500" width="500"src="svsu.jpg" class="img-rounded"> -->
				</div>  </font>
				
    </div> <!-- /container -->
  </body>
</html>
