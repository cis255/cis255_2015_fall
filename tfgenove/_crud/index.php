<!DOCTYPE html>
<!--
filename:    index.php
author:      Tessa Genovese, CIS-255, Fall 2015
description: This file displays a table of names, emails, and phone numbers along with the actions (read, update, and delete)
			 that can be performed on those entries.  It also provides a link to create a new entry in the list,
			 a link to a tutorial, and a link to a wireframe diagram for the assignment.
design: The file creates a navigation bar, table, a link to a diagram, and a footer that are displayed on the web page.
	<head>: 1. Charset
			2. Links to stylesheets
			3. Script
			4. Style for #emails

	<body>: 1. Container
			2. Nav
			3. Table
			4. Link To Diagram
			5. Subheadings
			6. Figure
-->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- 3. relative referencing and 8. Location: the stylesheet tfgenove_bootstrap.css will take
			precedence over the stylesheet bootstrap.min.css because they are the same specificity, but 
		tfgenove_bootstrap.css is located later than bootstrap.min.css -->
		<link   href="css/bootstrap.min.css" rel="stylesheet">
		<link 	href="css/tfgenove_bootstrap.css" rel="stylesheet">   <!-- added by the author -->
		<script src="js/bootstrap.min.js"></script>
		
		<!-- 4. Internal/Embedded CSS and  7. Id Selector: added by the author -->
		<style>
			#emails{
			margin-top: 150px;}
		</style>
	</head>
	
	<body>
		<!-- The bootstrap class container formats the page as a fixed width page layout -->
		<div class="container">
			<!-- The bootstrap class navbar formats the items in between the nav tags as a navigation bar.
				The bootstrap class navbar-inverse changes the look of the navbar to be the default formatting, namely
				namely having black words on a white bar.  In my program, this makes my words the correct color.
				The bootstrap class navbar-fixed-top fixes the navbar to the top of the screen, even when the 
			screen is being scrolled down.  The class banner is a CSS class defined by the author. -->
			<!-- added by the author -->
    		<nav class="navbar navbar-default navbar-fixed-top banner">
    			<h1>CIS 255 Email List</h1>
                <p>The purpose of this list is to provide a back end to test front end techniques.</p>
				<!-- The bootstrap class nav formats the list items as basic navbar elements.
					The bootstrap class navbar-nav formats the nav links.
				The bootstrap class pull-right moves the navbar elements in the list to the right of the screen -->
				<!-- added by the author -->
				<ul class="nav navbar-nav pull-right">
				<li><a href="create.php">Create</a></li>
				<li><a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1">Tutorial</a></li>
				</ul>
    		</nav>
			<!-- The bootstrap class row creates a row on the page in which the table will reside -->
				<div class="row">
				<!-- The bootstrap class table formats the table as a basic bootstrap table.
				The bootstrap class table-hover highlights the row that the user is hovering over. -->
				<!-- classes chosen by the author -->
					<table class="table table-hover" id="emails">
						<thead>
						<!-- 4. inline CSS: added by the author -->
							<tr style="text-decoration: underline;">
								<th>Name</th>
								<th>Email Address</th>
								<th>Mobile Number</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<!-- In the php code, the title attributes of the links and the glyphicons were added by the author. -->
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
				<div>
					<a href="https://moqups.com/tfgenove/PBUijylj/p:a16b2c2a4">Go To Moqups Wireframe Diagram</a>
				</div>
		</div> <!-- /container -->
		
			<!-- 9. Image added by the author -->
			<div>
			<!-- Inline CSS -->
				<figure style="position:relative;bottom:0px;width:100%;margin-left:0px;">
					<img src="../red_white_footer.png" />
					<figcaption>Website Design by Tessa Genovese, CIS 255, Fall 2015</figcaption>
				</figure>
			</div>
			
	</body>
</html>
						