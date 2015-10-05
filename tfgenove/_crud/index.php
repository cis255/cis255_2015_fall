<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<link 	href="css/tfgenove_bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
    		<nav class="navbar navbar-inverse navbar-fixed-top banner">
    			<h1>CIS 255 Email List</h1>
                <p>The purpose of this list is to provide a back end to test front end techniques.</p>
				 <ul class="nav navbar-nav pull-right">
					<li><a href="create.php">Create</a></li>
					<li><a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1">Tutorial</a></li>
				</ul>
    		</nav>
			<div class="row">
				<table class="table table-hover table-condensed" id="emails">
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
  </body>
</html>
