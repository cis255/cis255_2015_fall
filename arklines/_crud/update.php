<?php 
// Author: Allison Klinesmith
// Purpose: to test front end design with provided, back end code, and to test understanding of CSS and bootstra 
// Design:
//The specs are below.
//
//1. Copy the entire "_crud" directory recursively into your subdirectory. For example, after you position yourself in the correct directory, type "mkdir _crud" and "cp –R ../_crud01/* _crud". If you don't know how to copy files and directories in Linux, please learn this. This was supposed to be a prerequisite for this course. If you can't figure it out on your own, please come to my office hours ASAP!!!
//2. Inside the subdirectory, you will find 6 files with the extension, .php. You will NOT change database.php, but you will change the other 5 files. Change the HTML/CSS part of the code, not the PHP part of the code (unless you want extra credit). Use your own custom CSS/Bootstrap.
//3. Use relative referencing and absolute referencing when linking to external CSS files. Use double periods ".." in at least one of your references and put a numbered comment next to it so I can find it.
//4. Use in-line, internal (embedded) and external CSS.
//5. Use at least 20 Bootstrap classes and comment them to show you understand what they do.
//6. Use the "!important" attribute to override a Bootstrap class.
//7. Use at least one of each of the following: an ID selector, a CLASS selector, an ELEMENT selector, an attribute selector and a pseudo selector.
//8. Comment in your code at least one of each of the following: how your CSS execution is affected by (a) inheritance, (b) specificity, and (c) location.
//9. Add an image to each of the 5 files.
//10. Change all buttons to include appropriate glyph-icons.
	
	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	}
	
	if ( !empty($_POST)) {
		// keep track validation errors
		$nameError = null;
		$emailError = null;
		$mobileError = null;
		
		// keep track post values
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		
		// validate input
		$valid = true;
		if (empty($name)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}
		
		if (empty($email)) {
			$emailError = 'Please enter Email Address';
			$valid = false;
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Please enter a valid Email Address';
			$valid = false;
		}
		
		if (empty($mobile)) {
			$mobileError = 'Please enter Mobile Number';
			$valid = false;
		}
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE customers  set name = ?, email = ?, mobile =? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$email,$mobile,$id));
			Database::disconnect();
			header("Location: index.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM customers where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$name = $data['name'];
		$email = $data['email'];
		$mobile = $data['mobile'];
		Database::disconnect();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	
</head>

<body>
	
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
					<table class = "table table-boredered">
						<thead>
						<tr>
						<th>
						<img  src= "img/light-blue-background-3.jpg" style="width:100%; height:150px; position:top left:0px" />
						</th>
						</tr>
						</thead>
						</table>
		    			<h3>Update a Customer</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Name</label>
					    <div class="controls">
					      	<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
					    <label class="control-label">Email Address</label>
					    <div class="controls">
					      	<input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
					      	<?php if (!empty($emailError)): ?>
					      		<span class="help-inline"><?php echo $emailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
					    <label class="control-label">Mobile Number</label>
					    <div class="controls">
					      	<input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
					      	<?php if (!empty($mobileError)): ?>
					      		<span class="help-inline"><?php echo $mobileError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-submit"></span>Update</button>
						  <a class="btn" href="index.php">Back</a>
						  
						  
						  
						  
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
	
  </body>
</html>