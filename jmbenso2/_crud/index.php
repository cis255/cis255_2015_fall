<!DOCTYPE html>
<!-- 
filename: 		index.php
author:   		Jon Benson, CIS-255, Fall 2015
description: 	This file is the index of a simple front-end showcasing various techniques of bootstrap and CSS.

design:			
	<head>: 1. Character set
			2. Link to my custom stylesheet
			3. Link to bootstrap stylesheet
			4. Bootstrap JS script
			5. Internal CSS
	<body>: 
			1. Header text
			2. Welcome box
				i. Welcome header
				ii. Welcome text
				iii. CSS-themed image
			3. CIS 255 student table box
				i. List header
				ii. Create button
				iii. Table
				iv. Tutorial button
			4. Image thumbnail gallery
			
Requested comments included in this document:
3. Relative referencing
4. Inline/Internal/External CSS
5. 11 Bootstrap classes commented
7. Pseudo selectors, attribute selectors
8. Inheritance/Location 

-->

<html lang="en">
<head>
    <meta charset="utf-8">
	<link href="css/jmbenso2_prog02.css" rel ="stylesheet"> <!--3. Relative referencing 4. External CSS -->
    <link   href="css/bootstrap.min.css" rel="stylesheet">	<!--8. Because this stylesheet comes second, it takes priority -->
															<!-- due to its location. -->
    <script src="js/bootstrap.min.js"></script>
	<style> /* 4. An example of internal CSS */
		p b {
			color: rgb(51, 204, 255);
		}
		p b:hover {	/* 7. Pseudo-selector */
			color: rgb(51, 204, 204);    
		}
		[id^="center"] { /* 7. Attribute selector */
			width: 60%;
		}
	</style>
</head>

<body>
	<!-- Header -->
	<div class = "page-header"> <!-- Bootstrap class page-header: adds space around content and a dividing line underneath -->
		<div class ="text-center"> <!-- Bootstrap class text-center: aligns contents in the center of the page -->
									<!--8. This div has the same background as its parent page-header thanks to inheritance. -->
			<h1>CIS 255: Where Dreams Come True</h1>
		</div>
	</div>
	
	<!-- Welcome -->
	<div class="container">
		<div class="row">
			<h3>Welcome Home</h3>
			<!-- 4. Below is an example of inline CSS -->
			<p><b>CIS 255</b> offers only the best* CS and CIS students. Below is some crud, such that you might know who is in this class. Also try to add yourself to it.
			Or delete someone. Change their phone number as a hilarious prank! It's all up to you. <em style="color: rgb(51, 204, 255)">The power is in your hands. </em>
			</p>
			<div class="text-center">
				<!-- Bootstrap class img-circle: cuts the corners of the image, making it circular -->
				<!-- Bootstrap class img-responsive: Makes the image scale to parent  -->
				<img class="img-circle img-responsive" id="center-image" src="http://thumbs.dreamstime.com/x/hands-businessman-keyboard-laptop-10351604.jpg" /> 
			</div>
		</div>
	</div>
	
	<!-- Email list heading and table -->
    <div class="container">	
    		<div class="row">
    			<h3>CIS 255 Email List</h3>
                <p>The purpose of this list is to provide a back end to test front end techniques.</p>
    		</div>
			<div class="row">
				<p>
					<!--Bootstrap class icon: used to add glyphicon -->
					<!--Bootstrap class icon-pencil: specifically selects the pencil icon from the glyphicons sheet -->
					<a href="create.php" class="btn btn-success"><span class="icon icon-pencil"></span>  Create</a>
				</p>
				
				<!-- Bootstrap class table-bordered: adds border around table -->
				<!-- Bootstrap class table-responsive: allows scrolling in table on smaller screens -->
				<table class="table table-bordered table-responsive"> 
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
							   	echo '<td width=300>';
							   	echo '<a class="btn" href="read.php?id='.
								   $row['id'].'"><span class="icon icon-search"></span>  Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" 
								   href="update.php?id='.$row['id'].'"><span class="icon icon-wrench"></span>  Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" 
								   href="delete.php?id='.$row['id'].'"><span class="icon icon-remove"></span>  Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
				<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-success">
					<span class="icon icon-question-sign"></span>
					  Tutorial
				</a>
			</div>
    </div> <!-- /container -->

	<!-- Gallery of images on site -->
	<div class="container" id="image_gallery">
		<div class="row"> <!-- Bootstrap class row: contents' spans add up to 12 -->
			<div class="span3"> <!-- Bootstrap class span3: a quarter of the width of a row -->
				<!-- Bootstrap class thumbnial: formats as thumbnail with light border -->
				<img class="thumbnail" src="http://blogs-images.forbes.com/allbusiness/files/2014/12/Fotolia_74087814_Subscription_Monthly_M.jpg" />
			</div>
			<div class ="span3">
				<img class="thumbnail" src="http://static.guim.co.uk/sys-images/Books/Pix/pictures/2011/2/22/1298396381690/Adam-Nicolson-tackling-th-007.jpg" />
			</div>
			<div class ="span3">
				<img class="thumbnail" src="http://hashtagstudios.com/wp-content/uploads/2015/07/snl-weekend-update.jpg" />
			</div>
			<div class ="span3">
				<img class="thumbnail" src="https://c1.staticflickr.com/5/4007/5143180652_3f23fe8d95.jpg" />
			</div>
			
		</div>
	</div>
	
  </body>
</html>
