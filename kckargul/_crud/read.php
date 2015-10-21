<!--Name: 	Kevin Kargula
	Class: 	CIS 255
	Design:	Appealing picture
			"Read Customer"
			label "Name" - name
			label "email address" - email address
			label "mobile number" - mobile number
			back default button
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
<style>
  .container{
	margin-top: 25px;
	background-color: #fdfdfd;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link 	rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    			<div class="span10 offset1">
					<img src="https://40.media.tumblr.com/43e313527c1e172c8adee673a6fbe01b/tumblr_mv3j6bk8vu1sr7w3co1_500.jpg"/>
		    			<h3>Read a Customer</h3>
					<!--Makes the page horizontal-->
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
					<!--Gives the email address of the specific person-->
						     	<?php echo $data['email'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Mobile Number</label>
					    <div class="controls">
					      	<label class="checkbox">
					<!--gives the mobile number of the specific person-->
						     	<?php echo $data['mobile'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <!-Creates white button for going back-->
						  <a class="btn btn-default" href="index.php">
							<span class="glyphicon glyphicon-circle-arrow-left"/>
							Back
						  </a>
					   </div>
					
					 
					</div>
				</div>
    </div> <!-- /container -->
  </body>
</html>
