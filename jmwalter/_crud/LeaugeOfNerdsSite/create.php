<?php 
	/*comments
	Nothing special really in these pages .. i wanted to keep the formating from the main page with the banner and links at the top
	but also needed to keep the php links working.. generally i just wnated to keep the feeling that you are still in the same site. 
	so the banner is used to make the pages feel like a unifiying theme. 
	*/
	
	require 'database.php';

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
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO customers (name,email,mobile) values(?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$email,$mobile));
			Database::disconnect();
			header("Location: index.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	 <script src="../js/bootstrap.min.js"></script>
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
	 <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
	
   
</head>

<body>

	<div id="MasterContainer">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	
					</button>
					<a class="navbar-brand" href="index.php">home</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><!-- 1.this class indecates the menu bar at the top of the page, it collapses when you scroll down 
																							but reapears if you sroll up-->
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="http://csis.svsu.edu/~jmwalter/cis255/jmwalter/jmwalter.html">About</a> <!-- used to be about.html .. but i figured i could link it to my dir in the server-->
						</li>
						<li>
							<a href="post.html">Sample Post</a>
						</li>
						<li>
							<a href="contact.html">Contact</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>

		<!-- Page Header -->
		<!-- Set your background image for this header on the line below. -->
		<header class="intro-header" style="background-image: url('img/website_bannor.png')"><!--2. this class is used primarally to deal with the banner image -->
			<div class="container"><!--3. the container class is used in all bootstrap and all boot strap css must be wrapped in it -->
				<div class="row"><!--4. boot strap uses rows and collumns to make a "pretty" website row class creates a new row in a div -->
					<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"><!--5. here we are saying column large 8/12=1 so one colun if screen is large offset is not clear what it does -->
						<div class="site-heading"> <!--6. BIG INTRO this is where the name of your site will go and some big attention grabbing graphics maybe -->
							<h1>The League ofNerds</h1>
							<hr class="small">
							<span class="subheading">Three unquallified nerds bring you news, reviews and nerd rage all in one podcast</span>
						</div> <!--7. subheadings is where maybe a quick snipit would be, or your company mission statment -->
					</div>
				</div>
			</div>
		</header>
	</div>

	
	
	
	


    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Create a Customer</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="create.php" method="post">
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
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>