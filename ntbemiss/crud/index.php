<!DOCTYPE html>
<html lang="en">
	<head>
		<!--  
		Nick Bemiss 
		This page contains: 
			3:1,2
			4:1,2
			5's
			7:1,2,3,4
			8:a,b,c
			9's
			10:1,2,3,4,5
			
			Search: 3.1, 9.1, ect... to find them.
	
		Program_02:
		`1. _crud has been copied.
		`2. index, create, delete, read, and update were edited to fit my alien theme.
		`3. I used relative referencing on this page around line 35 that looks like: <link   href="css/bootstrap.min.css" rel="stylesheet">
			On the next line, I use absolute referencing.
		`4. 	external css is used on the first half of the header and on the backgrounds/body of texts.
			internal css is used on the p, th, body color, and h1 color.
			inline is used on the first p, along with a class tag.
		5. The bootstrap classes are used spread through the page
		6. I used the important tag on the header to override the color in the heading and on some of the p text
		7. I used a ID selector on the heading and several other marked places, class selector for each bootstrap class, and an element selector in the heading.
		8. All three of inheritance, specificity and location can be found in this document.
		9. I've added an image to each of the 5 php files. Just a small html5 icon.
		10.	glyph cons.... lookin good!
	-->
		<meta charset="utf-8">
			<link rel="stylesheet" href="../crud/css/prog2.css">
				<!--3.1 Relative referencing-->
				<link   href="css/bootstrap.min.css" rel="stylesheet">
					<link   href="http://csis.svsu.edu/~ntbemiss/cis255/ntbemiss/_crud/css/bootstrap.min.css" rel="stylesheet">
						<!--3.2 Absolute referencing-->

						<script src="js/bootstrap.min.js"></script>

						<style>
							<!--7.1 This is element selector-->
							h1 {
								color: red;
							} 
							p  {
								color: green;
								font-family: "Arial";
								font-weight: bold;
							}
							th {
								color: #00CC00; !important
								}
							<!--8.c location causes this color to only apply to this page, as opposed to the color set in the css file -->
							body {
								background-color: #00CC00 !important;
							}
							<!--7.4 psuedo selector-->
							a:hover {
								color: #FF0000;
							}

						</style>
					</head>

					<body>

						<div class="container">
							<!--5.2 container puts padding and a margin around the contained items-->

							<center>

								<div class = "badge">
									<h3>A Nick Bemiss Production...</h3>
								</div>
								<!--4.2 external css makes this bold-->
								<div class="jumbotron">
									<h1 id="message">THE LIST</h1>
								</div>
								<!--5.3 Jumbotron makes my header larger and sets it in a box space -->
								<!--8.a Jumboton also inherits the color of the text -->
								<!--7.2 This is class selector-->

								<p style="color: grey !important"  id="message">The purpose of this list is to prove to you that aliens exist.</p>
								<!--4.1 inline css -->
								<!--6.1 used important -->
								<!--8.b Specificity makes the white take priority  -->
								<p> Also here is my diagram: <a href="https://moqups.com/nickt1990/ukfgsqnp">Diagram</a>
								</p>
								<!--9.1 image -->
								<img src= "http://backwoodshorror.com/wp-content/uploads/2012/06/alien-banner.jpeg">
									<div class="breadcumb">Aliens...</div>
									<!--5.4 Breadcrumb makes the text small with padding and a border-->
								</center>
								<div class="row">
									<!--5.5 row creates a margin to both sides-->
									<p id="message">
										<!--7.3 This is id selector-->
										<a href="create.php" class="btn btn-success">
											<span class="glyphicon glyphicon-wrench">Create</span>
										</a>
									</p>

									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Name</th>
												<th>Email Address</th>
												<th>Mobile Number</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM customers ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['name'] . '</td>';
							   	echo '<td>'. $row['email'] . '</td>';
							   	echo '<td>'. $row['mobile'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="read.php?id='.
								   $row['id'].'">
<span class="glyphicon glyphicon-search">Read</span>
</a>';

							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" 
								   href="update.php?id='.$row['id'].'">
<span class="glyphicon glyphicon-arrow-up">Update</span>
</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" 
								   href="delete.php?id='.$row['id'].'">
<span class="glyphicon glyphicon-trash">Delete</span>
</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
										</tbody>
									</table>
									<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-success">
										<span class="glyphicon glyphicon-education">Tutorial</span>
									</a>
								</div>
							</div>
							<!-- /container -->
							<img src="https://pbs.twimg.com/profile_images/1835472348/html5-logo-1_normal.jpg">
							</body>


						</html>
						