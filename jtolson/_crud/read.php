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
		<meta charset="utf-8"/>
		<link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
		<script src="js/bootstrap.min.js"></script>
		<title>CIS 255 Email List - Read</title>
		<!-- For the following style tag: -->
		<!-- .form-actions:
				Inspecting the element on the page revealed there was already CSS tied to
				form-actions, so I used !important to override that to personalize the page. 
				For some reason, I had to use !important with a class and ID selector to override 
				the CSS file-->
		<!-- .row:
				Moves the image and header tag over to be inline with the box -->
		<!-- .checkbox:
				Pseudo selector for the checkbox class 
				In order to get the hover to work, I had to add 
				link and visited before it-->
		<style>
			body{
				background-color: #F5F5F5;
				position: relative;
				top: 30px;
			}
			.form-horizontal{
				border: 5px dotted black;
			}
			.form-actions{
				padding-left: 30px !important;
				margin-bottom: 0px !important;
			}
			#backBtn{
				padding-left: 30px !important;
				margin-bottom: 0px !important;
			}
			.row{
				position: relative;
				left: 20px;
			}
			.checkbox:link{
				color: #FFFFFF;
			}
			.checkbox:visited{
				color: #FFFFFF;
			}
			.checkbox:hover{
				color: #0099FF;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="span10 offset1">
				<div class="row">
					<a href="index.php"><img class="img-responsive" src="icon-read.jpg" alt="Read listing" width="100" height="150"/></a>
					<!-- h3 tag has "Listing's Details" instead of "Customer" now -->
					<h3>Read a Listing's Details</h3>
				</div>
				<div class="form-horizontal">
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
					<div class="form-actions" id="backBtn">
						<!-- Added glyphicon -->
						<a class="btn btn-info" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
					</div>
				</div>
			</div>
		</div> <!-- /container -->
	</body>
</html>