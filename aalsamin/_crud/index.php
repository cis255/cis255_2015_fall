<!DOCTYPE html>
<!-- ------------------------------------------------------------------------------------------------
filename: index.php
author  : george corser, cis255, fall2015
descr   : this php file displays a list of customers from a mysql database
purpose : the purpose of this file is to demonstrate front end css styling on back end app
notes   : to prettify in Notepad++, use Plugins | XML Tools | Pretty Print

design  : <head> identifies external css and js files
          <body> 
		      a. displays heading and paragraph
			  b. displays create button
			  c. displays table (list of customers, plus buttons for read, update, and delete)
			  d. displays link to startutorial

assignment: this program demonstrates the following...

          1. relative address of external file
		  2. absolute address of external file
		  3. bootstrap class
		  4. inline css
		  5. external css
------------------------------------------------------------------------------------------------ -->
<html lang="en">
<head>
    <meta charset="utf-8">
	<!-- below: 5. external css -->
    <link   href="css/bootstrap.min.css" rel="stylesheet"> <!-- 1. relative address of external file -->
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container"> <!-- 3. bootstrap class -->
    		<div class="row"> <!-- 3. bootstrap class -->
    			<h3>CIS 255 Email List</h3>
                <p>The purpose of this list is to provide a back end to test front end techniques.</p>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success">Create</a> <!-- 3. bootstrap classes -->
				</p>

				<table class="table table-striped table-bordered"> <!-- 3. bootstrap classes -->
		              <thead>
		                <tr style="color: white; background-color: grey;"> <!-- 4. inline css -->
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
							   	echo '<a class="btn"
									href="read.php? id='.$row['id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success"
								  	href="update.php?id='.$row['id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger"
								   	href="delete.php?id='.$row['id'].'">Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
				<!-- 2. relative address of external file -->
				<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-success">Tutorial</a>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
