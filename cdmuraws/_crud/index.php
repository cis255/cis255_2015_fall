
<!DOCTYPE html>
<!--
filename:    index.php
author:      Cory Murawske, CIS-255, Fall 2015
design:
	<head>: 1. Relative Referencing
			2. Internal/Embedded CSS
			3. ID Selector

	<body>: 4. Container
			5. Navigation Bar
			6. Table of records
			7. Inline CSS
			8. Subheadings
			9. Image added
		   10. Inline CSS
-->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- 1. Relative Referencing-->
		<link   href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		
		<!-- 2. Internal/Embedded CSS and  3. ID Selector-->
		<style>
			#records{
			margin-top: 50px;}
		</style>
	</head>
	
	<body>
		<!-- The bootstrap class container formats the page as a fixed width page layout -->
		<div class="container">
			<!-- The bootstrap class navbar formats the items in between the nav tags as a navigation bar.
				The bootstrap class navbar-inverse changes the look of the navbar to be the default formatting -->
    		<nav class="navbar navbar-default">
    			<h1>CIS 255 Email List</h1>
                <p>The purpose of this list is to provide a back end to test front end techniques.</p>
				<!-- The bootstrap class nav formats the list items as basic navbar elements.
					The bootstrap class navbar-nav formats the nav links.
				The bootstrap class pull-right moves the navbar elements in the list to the right of the screen -->
				<ul class="nav navbar-nav pull-left">
				<li><a href="create.php">Create</a></li>
				</ul>
				<ul class="nav navbar-nav pull-right">
				<li><a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1">Tutorial</a></li>
				</ul>
    		</nav>
			<!-- The bootstrap class row creates a row on the page in which the table will reside -->
				<div class="row">
				<!-- The bootstrap class table formats the table as a basic bootstrap table.
				The bootstrap class table-hover highlights the row that the user is hovering over. -->
					<table class="table table-hover" id="records">
						<thead>
						<!-- 7. inline CSS -->
							<tr style="font-style: italic;">
								<th>Name</th>
								<th>Email Address</th>
								<th>Mobile Number</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
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
							echo '<a href="read.php?id='.
							$row['id'].'" title="Read"><i class="icon-book icon-blue"></i></a>';
							echo '&nbsp;';
							echo '<a href="update.php?id='.$row['id'].'" title="Update"><i class="icon-pencil icon-yellow"></i></a>';
							echo '&nbsp;';
							echo '<a href="delete.php?id='.$row['id'].'" title="Delete"><i class="icon-remove icon-red"></i></a>';
							echo '</td>';
							echo '</tr>';
							}
							Database::disconnect();
							?>
						</tbody>
					</table>
				</div>
		</div> <!-- /container -->
		
			<!-- 9. Image added -->
			<div>
			<!-- 10. Inline CSS -->
				<figure style="position:relative;bottom:0px;width:200px;height:100px;margin-left:500px;">
					<img src="../thumbsup.jpg" />
					<figcaption>This website was created by Cory Murawske to showcase Bootstrap, CIS 255, Fall 2015</figcaption>
				</figure>
			</div>
		</div>
	</body>
</html>
						