<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class = "page-header">
		<h1>CIS 255: Where Dreams Come True</h1>
		<div class ="row">
			<div class="col-sm-12">
				<img class="img-circle img-responsive" src="http://thumbs.dreamstime.com/x/hands-businessman-keyboard-laptop-10351604.jpg" />
			</div>
		</div>
	</div>
    <div class="container">		
		<div class ="">
    		<div class="row">
    			<h3>CIS 255 Email List</h3>
                <p>The purpose of this list is to provide a back end to test front end techniques.</p>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success"><span class="icon icon-pencil"></span>  Create</a>
				</p>
				
				<table class="table table-striped table-bordered table-responsive">
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
		</div> <!-- /jumbotron -->
    </div> <!-- /container -->
  </body>
</html>
