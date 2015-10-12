<!DOCTYPE html>
<html lang="en">
<head>
	<title>Gaming Central</title>
	
    <meta charset="utf-8">
	<link rel="stylesheet" href="..\my.css">      <!-- External CSS only effective on pages with wells -->
												  <!-- Psuedo selector inside External CSS             -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">  <!-- The lowest style sheet will be most specefic -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
	<nav class="navbar navbar-default navbar-fixed-top">  <!-- Class creates a navigation bar on the top -->
		<div class="navbar navbar">
			<div class="navbar-nav navbar-left">    <!-- I put a picture on the left and pushed the menu links to the right -->
				<a class="navbar-brand" href="index.php"><img src="Gaming Central Heading.jpg" class="img-rounded"></a>
			</div>
		<div>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="create.php">Create</a></li>
				<li><a href="delete.php">Delete</a></li>	<!-- Navbar menu -->
				<li><a href="update.php">Update</a></li>
				<li><a href="read.php">Read</a></li>
			</ul>
		</div>
		</div>
	</nav>
	</div>

    <div class="container">
			<div style="background: transparent" class="jumbotron">    <!-- Inline CSS --> <!-- this is inherited because its inline -->
				<img src="JumbotronPic.jpg" class="img-responsive">    <!-- Creating jumbotron and putting pic -->
			</div>
			
			<hr>
			
    		<div class="row">
    			<h3>Gaming Central Client List</h3>
                <blockquote>For 15 wonderful years, Gaming Central has provided its customers with the best possible gaming experience. We provide the best possible customer service, while supplying anyone's gaming needs.</blockquote>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Create</a>    <!-- Putting glyphicon in the button -->
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
				<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-success">Tutorial</a>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
