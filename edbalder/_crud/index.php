<!DOCTYPE html>

<!-- Design: https://moqups.com/balderramaed@gmail.com/Gc3XJKZP -->
<!-- Numbers on this Page
			3
			4.1-4.2
			5.1-5.15
			8
			-->

<html lang="en">



<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet"> <!-- 8(c) because this has a higher location than mycssfile.css, it will be overwritten by it-->
	 <link href="http://csis.svsu.edu/~edbalder/cis255/edbalder/_crud/css/buttons.css" rel="stylesheet">	 <!-- 3.1 Absolute referencing -->
	 <link href="../_crud/css/mycssfile.css" rel="stylesheet">  <!-- 3.2/3.3 Relative referencing / greater positioning will overwrite CSS in bootstrap.css--> 
    <script src="js/bootstrap.min.js"></script>
	<style>
		.table-bordered th 
			{ 
				background-color:#e8e8e8;
			} <!-- 8(b) Here is were specificity is trumping -->
		<!-- 4.1 Internal CSS-->
	</style>
</head>

<body>
    <div class="container"> 
    		<div class="row jumbotron"> <!-- 8(a)/5.1 The color of the text in jumbotron is being inherited / jumbotron Creates a grey box thing -->
				<table class="table">
				<thead>
					<tr>
					<th class="text-center">CIS 255 Email List</th> <!-- 5.2 center centers the content -->
					</tr>
				</thead>
				</table>
                <p style="margin-left:200px;">The purpose of this list is to provide a back end to test front end techniques.</p> <!-- 4.2 Inline CSS -->
    		</div>
			<div class="row">
				<p>
					<div class="btn-group"> <!-- 5.3 "btn-group" creates a group that binds the links together -->
						<a href="create.php" class="btn btn-success raised round"><span class="glyphicon glyphicon-plus-sign"> Create</span></a> <!-- 5.4/5.5/5.6 glyphicon accesss library of icons / btn creates a button / raised raises the button-->
						<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-success raised round"><span class="glyphicon glyphicon-book"> Tutorial</span></a>
					</div>
				</p>
				
				<table class="table table-striped table-bordered" id="main_table"> <!-- 5.7/5.8/5.9 table creates a table / table-striped stripes the table with different colored rows / table bordered defines the border of table-->
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
							   	echo '<td width=450>';
							   	echo '<a class="btn btn-primary gradient" href="read.php?id='. 
								   $row['id'].'"><span class="glyphicon glyphicon-folder-open"> Read</span></a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" 
								   href="update.php?id='.$row['id'].'"><span class="glyphicon glyphicon-log-in"> Update</span></a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" 
								   href="delete.php?id='.$row['id'].'"><span class="glyphicon glyphicon-fire"> Delete</span></a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
					  <!-- tags used in <php>-->
					  <!-- 5.10/5.11/5.12/5.13/5.14/5.15 
						btn-primary makes the button blue 
						glyphicon-folder-open generates the open folder glyphicon
						btn-success makes a green button
						glyphicon-log-in makes the log-in glyphicon
						btn-danger makes a red button 
						glyphicon-fire makes the fire glyphicon/ -->
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
