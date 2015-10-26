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
		<!-- 3. here is the example of absolute referencing-->
			<link ref="http://csis.svsu.edu/~drdarlin/cis255/drdarlin/drdarlin_prog02/crud/css/bstrap.css" rel="stylesheet">
			<!-- 3. Here is an example of the ../ thing which means go to the folder above-->
				<link   href="../crud/css/drdarlin_prog02.css" rel="stylesheet"> 
					<script src="js/bootstrap.min.js"></script>
				</head>

				<body>
					<style>
<!-- changes color to white ish, changes the cursor type, sets positioning of object accordding to surrounding elements-->
#header {color: #2E9AFE;
		cursor:not-allowed;
		position:relative;
		margin-left: 100px;
		left:50px;
		top:0px;
 }
  <!-- the next three are for the headers for each subject matter when reading about a customer-->
 <!-- I wanted the color to be white and wanted the location to be static (left ish on the page)-->
 #content1 {color: #FFFFF;
		position:absolute;
		left:250px;
		top:105px;

 }
  <!-- I wanted the color to be white and wanted the location to be static (center ish on the page)-->
  #content2 {color: #FFFFF;


		position:absolute;
		left:605px;
		top:105px;

 }
  <!-- I wanted the color to be white and wanted the location to be static (right ish on the page)-->
  #content3 {color: #FFFFF;


		position:absolute;
		left:975px;
		top:105px;

 }
  <!-- I had trouble setting the location of this button so I cheated and set this permanent location -->
 #back-button {
		position:absolute;
		left:630px;
		top:200px;
 }		
  <!-- this is for the picture's positioning :(  I cheated again-->
figure {position:absolute;
		top: 0px;
		left:0px;
		z-index: -1;}


#form-header{
  border-bottom: 1px solid #fff !important;
}
					</style>
					<!-- Main header for the page styling is from drdarlin_prog02.css-->
					<div class="row">
						<h3> Read a Customer</h3>
					</div>

					<div id ="form-header" >
					<!-- this styling is for the image. I wanted the picture to be in the top right so I put it 
						 in a figure and gave it an absolute position so it is static-->
						<figure>
							<img  src="img/snowPlow.jpg" width="200" height="100">
						</figure>
						<!-- Here is an example of using an identifier for styling, the styling is embedded in this doccument-->
						<label style = padding-left:100px !important; id = "header">Name</label>
						<label style = padding-left:210px !important; id = "header" >Email Address</label>
						<label style = padding-left:150px !important; id = "header">Mobile Number</label>
					</div>
					<!-- this container needs styling info from drdarlin_prog02.css and also an identifer that has styling from this document-->
					<div class="container">
						<div >
							<label id="content1" >
								<?php echo $data['name'];?>
							</label>
						</div>
						<!-- this container needs styling info from drdarlin_prog02.css and also an identifer that has styling from this document-->
						<div >
							<label id="content2">
								<?php echo $data['email'];?>
							</label>
						</div>
						<!-- this container needs styling info from drdarlin_prog02.css and also an identifer that has styling from this document-->
						<div >
							<label id="content3">
								<?php echo $data['mobile'];?>
							</label>
						</div>
					</div>			
					<div><!-- this container needs styling info from drdarlin_prog02.css and also an identifer that has styling from this document-->
						<a id="back-button" class = "btn-back" href="index.php">
							<span class=" glyphicon-arrow-left"/>
						</a>
					</div>
				</div>
				<!-- end of container -->
			</body>
		</html>