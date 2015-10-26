<!DOCTYPE html>
<!-- ------------------------------------------------------------------------------------------------
filename: index.php
author  : Tyler O'Lear, CIS255, Fall2015
descr   : this php file displays a list of customers from a mysql database
purpose : the purpose of this file is to demonstrate front end css/bootstrap styling on back end app
notes   : to prettify in Notepad++, use Plugins | XML Tools | Pretty Print
          or don't because its breaking PHP haha!

design  : <head> identifies external css/bootstrap and js files also tab title
          <style> internal css
          <body> 
        1. displays navbar
		    2. displays heading as Jumbotron with picture and paragraph
			  3. displays create button
			  4. displays table (list of customers, plus buttons for read, update, and delete)
			  5. displays link to startutorial
        6. ALL BUTTONS HAVE GLYPHICONS
assignment: this program demonstrates the following...

      1. relative address of external file
		  2. absolute address of external file
		  3. bootstrap class
		  4. inline css
		  5. external css
------------------------------------------------------------------------------------------------ -->
<html lang="en">
<head>
	<title>Gaming Central</title>
														<!-- the location or order of these is important. Lowest will overwrite others with same element mod -->
    <meta charset="utf-8">								<!-- !import is inlcuded in my External CSS -->
	<link rel="stylesheet" href="..\my.css">           <!-- External CSS, sheet only effects pages where a well is used. This is relative address -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  <!-- this is an absolute address -->
    <script src="js/bootstrap.min.js"></script>
</head>

<style>
	h3 {
		text-align: center;      <!-- Embedded CSS -->
		font-weight: bold;
	}
</style>

<body>
	<div class="navbar">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="navbar navbar">							<!-- Creates a navbar on top of page. I chose to push menu part to right and inlcude a pic on the left -->
			<div class="navbar-nav navbar-left">
				<a class="navbar-brand" href="index.php"><img src="Gaming Central Heading.jpg" class="img-rounded"></a>
			</div>
		<div>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="http://csis.svsu.edu/~tmolear/cis255/tmolear/_crud/create.php">Create</a></li> <!-- Absolute address -->
				<li><a href="delete.php">Delete</a></li>
				<li><a href="update.php">Update</a></li>
				<li><a href="read.php">Read</a></li>
			</ul>
		</div>
		</div>
	</nav>
	</div>

    <div class="container">												<!-- Inline CSS is more specefic than a stylesheet so its picked over stylesheet. -->
			<div style="background: transparent" class="jumbotron">    <!-- Inline CSS -->  
				<img src="JumbotronPic.jpg" class="img-responsive">	   <!-- Jumbotron with pick inside puts box on top of page with background and padding -->
			</div>
			
			<hr>
			
    		<div class="row">
    			<h3>Gaming Central Client List</h3>
                <blockquote>For 15 wonderful years, Gaming Central has provided its customers with the best possible gaming experience. We provide the best possible customer service, while supplying anyone's gaming needs.</blockquote>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Create</a> 	<!-- adding glyphicon did the same for all buttons -->
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
							   	echo '<a class="btn-sm btn-info" href="read.php?id='.
								   $row['id'].'"><span class="glyphicon glyphicon-file"></span> Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn-sm btn-success" 
								   href="update.php?id='.$row['id'].'"><span class="glyphicon glyphicon-upload"></span> Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn-sm btn-danger" 
								   href="delete.php?id='.$row['id'].'"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
				<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-success"><span class="glyphicon glyphicon-play-circle"</span> Tutorial</a>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
