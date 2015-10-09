<!DOCTYPE html>
<!--
Filename	: 	index.php
Author		: 	Imran Khan, CIS-255, Fall 2015
Description	: 	This php program prints out each user in the database, and will redirect you
				to a page where you can update, remove, or read the user's information. Also, you can create a new user
Design		: 	The program is a menu that allows a user to create, read, update, or delete a user.
	<head>: Contains the .js and .css files
	<body>: 1. All elements are contained inside of a container
			2. The jumbotron is a page header that holds the h1
			3. The create button allows you to add a new user to the database, which will be reflected in the table
			4. The information for each user is printed row by row, and is retrieved from the database
			5. An update, read, and delete button is printed in each row.
			6. The tutorial button redirects you to a guide on _crud
			 
-->
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
				<link   href="css/bootstrap.min.css" rel="stylesheet">
					<link   href="../background.css"" rel="stylesheet"> 
						<!-- #3 Used .. When references an external css -->


					</head>

					<!-- embedded style to make h1 text color red
	 Since the location for this style appears after the link to the bootstrap.min.css,this will take priority over
	 that of the .css file -->
					<style>
	h1{
		color:red !important;
	}
					</style>

					<body>

						<div class="container">
							<!-- This image will resize based on the size of the screen. Also the pull-right will pull the image to the right of the screen -->
							<img src="../logo1.png" class="img-responsive pull-right img-rounded" alt="SVSU Cardinals" width="200" height="180" id="index_image" title="SVSU Logo" >&nbsp&nbsp&nbsp
								<!-- Jumbotron is a type of container which basically holds elements -->
								<div class="jumbotron">
									<h1 align="center">CIS 255 Email List</h1><br /> 
								</div>

								<div class="row">
									<p>The purpose of this list is to provide a back end to test front end techniques.</p>
								</div>
								<div class="row">
									<p>
										<a href="create.php" class=" btn btn-success glyphicon glyphicon-plus">Create</a>
									</p>
									<p align="right">
										<!-- This is a badge showing number of customers in table. It is static, though. -->
										<a href="#">Number of users <span class="badge">13</span></a><br>
											<p>
												<!-- table-hover will change the color of the current row that your cursor is on -->
												<table class="table table-striped table-bordered table-hover">
													<thead>
														<tr class="odd">
															<th>Name</th>
															<th>Email Address</th>
															<th>Mobile Number</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<!-- Changed the order by to order by name -->
														<tr><td>Ann</td><td>ann@ann.Ann</td><td>456</td><td width=250><a class="btn" href="read.php?id=15">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=15">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=15">Delete</a></td></tr><tr><td>ant</td><td>ant@and.as</td><td>111</td><td width=250><a class="btn" href="read.php?id=20">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=20">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=20">Delete</a></td></tr><tr><td>asd</td><td>asd@asd.asd</td><td>asd</td><td width=250><a class="btn" href="read.php?id=2">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=2">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=2">Delete</a></td></tr><tr><td>asd</td><td>asdq@asd.asda</td><td>asd</td><td width=250><a class="btn" href="read.php?id=4">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=4">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=4">Delete</a></td></tr><tr><td>bbb</td><td>bb@bb.bb</td><td>bbb</td><td width=250><a class="btn" href="read.php?id=21">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=21">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=21">Delete</a></td></tr><tr><td>cat</td><td>cat@cat.cat</td><td>CAT</td><td width=250><a class="btn" href="read.php?id=16">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=16">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=16">Delete</a></td></tr><tr><td>ccc</td><td>ccc@ccc.ccc</td><td>ccc</td><td width=250><a class="btn" href="read.php?id=22">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=22">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=22">Delete</a></td></tr><tr><td>Dave</td><td>adks@htm.com</td><td>899988</td><td width=250><a class="btn" href="read.php?id=27">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=27">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=27">Delete</a></td></tr><tr><td>Demet-wee-us Dun-wap</td><td>theRealMeech@yahoo.com</td><td>298-330-8004</td><td width=250><a class="btn" href="read.php?id=29">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=29">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=29">Delete</a></td></tr><tr><td>Demo</td><td>Demo@Demo.com</td><td>Demo</td><td width=250><a class="btn" href="read.php?id=36">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=36">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=36">Delete</a></td></tr><tr><td>fox</td><td>fox@fox.fox</td><td>asd</td><td width=250><a class="btn" href="read.php?id=19">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=19">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=19">Delete</a></td></tr><tr><td>Jessica</td><td>Todo@aol.com</td><td>666</td><td width=250><a class="btn" href="read.php?id=6">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=6">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=6">Delete</a></td></tr><tr><td>joejoe</td><td>jo@joe.joe</td><td>jojojojojojojo</td><td width=250><a class="btn" href="read.php?id=5">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=5">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=5">Delete</a></td></tr><tr><td>test</td><td>test@test.html</td><td>test</td><td width=250><a class="btn" href="read.php?id=28">Read</a>&nbsp;<a class="btn btn-success glyphicon glyphicon-refresh" 
									   href="update.php?id=28">Update</a>&nbsp;<a class="btn btn-danger glyphicon glyphicon-remove" 
									   href="delete.php?id=28">Delete</a></td></tr>						  </tbody>
												</table>
											</div>
											<!-- The panel creates a visual container, that can store elements inside. -->
											<div class="panel panel-default">
												<div class="panel-body">
													<!-- When hovering the button, text will show up next to the button -->
													<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-success glyphicon glyphicon-education" data-toggle="tooltip" title="A tutorial on _crud"> Tutorial</a>
												</div>
											</div>
										</div>
									</div> 
									<!-- /container -->
								</body>
							</html>
							