<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<!-- Meta tag makes website mobile-first-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container">
				<!--added class to format header-->
    			<h3 class="header page-header">CIS 255 Email List</h3>
                <p>The purpose of this list is to provide a back end to test front end techniques.</p>
    		
			<div class="row">
				<p>
					<!-- changed class from button success to button primary-->
					<a href="create.php" class="btn btn-primary">Create</a>
				</p>
				<!-- table-bordered-thick gives a 2px shadow to the bottom-right sides of the table -->
				<table class="table table-striped table-bordered-thick">
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
								   $row['id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" 
								   href="update.php?id='.$row['id'].'">Update</a>';
							   	echo '&nbsp;';
								/*Addition of title gives rollover text warning in php*/
							   	echo '<a class="btn btn-danger disabled"
								   href="delete.php?id='.$row['id'].'" title="WARNING: You may not have the required access for this">Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
					  
				      </tbody>
	            </table>
				<!-- changed tutorial button from class success to class info, which is normally used for links.-->
				<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-info" role="button">Tutorial</a>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
