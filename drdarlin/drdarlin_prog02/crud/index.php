<!DOCTYPE html>

 <!-- Hello,
 This assignment was really fun. I got a really good grasp on css. I realized a lot of tings I need to work on, but I also learned a lot. I felt that the assignment requirements ruined my website haha but I understand why we need to do those requirements. The glyphicons made my website ugly and they didn't work for the most part. That is a growing opportunity. I will be changing it back to what I had before I added the assignment requirements. Check out the design at the bottom of this page(it is in an anchor)-->

 
 <!-- Another thing, I'm not sure why, but a lot of my formatting was changed when I viewed this project on the school's computer. The script issue was one of many things that only
appered after I viewed all of this stuff on campus. It's really frustrating. For example, the customer info on read.php.---> 
 <html lang="en">
	<head>
		<meta charset="utf-8">
			<style>
		figure {position:absolute;
		top: 10px;
		left:1050px;
		z-index: -1;}
			</style>
		<!-- Here is a link to the newest version of bootstrap-->
		<link   href="css/bstrap.css" rel="stylesheet">
		<!-- here is my CSS --> 
		<link   href="css/drdarlin_prog02.css" rel="stylesheet"> 
		<!-- Here is a link to the bootstrap that you supplied to us-->	
			<script src="js/bootstrap.min.js"></script> 
	</head>

	<body>
		<div class="container">
		<!-- This header has styling from drdarlin_prog02.css-->	
		<div class="row">
			<h3>Customer List </h3>
			<figure >
				<img  src="img/snowPlow.jpg" width="200" height="100">
			</figure>
		</div>
		<div class="row">
			<p>
				<a href="create.php" class="btn btn-success">Create New Customer <span class="glyphicon glyphicon-plus"/></a>
			</p>
			<!-- defining a table that has styling from drdarlin_prog02.css-->	
				<table class="table table-striped">
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
										$row['id'].'">View</a>';
									echo '&nbsp;';
									echo '<a class="btn btn-success" 
										  href="update.php?id='.$row['id'].'">
										 <span class="glyphicon glyphicon-plus"/>
										 </a>';
									echo '&nbsp;';
									echo '<a class="btn btn-danger" 
										   href="delete.php?id='.$row['id'].'">
										  <span class="glyphicon glyphicon-trash"/></a>';
									echo '</td>';
									echo '</tr>';
						}
					   Database::disconnect();
						?>
					</tbody>
						</table>
						<!-- Here is the design for my website-->	
						<a href="https://moqups.com/dddd11/HkLxIcqO">Check out my design</a>
		</div>
						<!-- end of container -->
	</body>
</html>
				