<!--
	name: 	Kevin Kargula
	class:	CIS-255
	design:	Well around everything
			Header:
				dark background
				And email icon to the right
			Body:
				Create button - green
				Table
					shaded head
					condensed zebra body
						name
						email
						number
						buttons - far right
							read - left align glyphicon, info button
							update - pencil glyphicon, success button
							delete - trash glyphicon, danger button
				tutorial button
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<!--New refrence file that actually works!!!-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!--External CSS file-->
	<link rel="stylesheet" href="external.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<style>
  .jumbotron{
	background-color:#777777;
	padding: 10px;
	padding-left: 5%;
	margin: auto;
	margin-bottom:10px;
	color: white;
}
  .container-fluid{
	margin-left: 5%;
	margin-right: 5%;
}
  p a{
	postion: relative;
	left:50%;
	margin-right: -50%;
}
  th{
	background-color: #BBBBBB;
}
  .btn{
	margin-left:	5px;
	margin-right:	5px;
}
  .glyphicon{
	padding-right:	5px;
}
  img{
	height:100px;
}
</style>
<body>
<div class="well">
    <div class="jumbotron">
		<table>
			<tr>
	    		<td>
					<!--The header-->
					<h3>CIS 255 Email List</h3>
	    			<p>The purpose of this list is to provide a back end to test front end techniques.</p>
				</td>
				<td>
					<!--puts a glyphicon of an envelope in-->
					<img src="http://ralidacalheta.com/images/email_icon.gif"/>
				</td>
			</tr>
		</table>
  	</div>
    <div class="container-fluid">
			<div class="row">
				<p style="right:50%;">
					<!--button that goes to the create.php-->
					<a href="create.php" class="btn btn-success">Create</a>
				</p>
				<!--Sets up a table where the every other column is a different shade-->
				<table class="table table-striped table-condensed">
		              <thead>
		                <tr>
		                  <th>Name</th>
		                  <th>Email Address</th>
		                  <th>Mobile Number</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
						<!--Creates the table from database-->
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM customers ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td class="col-sm-1">'. $row['name'] . '</td>';
							   	echo '<td class="col-sm-2">'. $row['email'] . '</td>';
							   	echo '<td class="col-sm-5">'. $row['mobile'] . '</td>';
							   	echo '<td class="col-sm-4" >';
							   	echo '<a class="btn btn-info btn-sm col-sm-3"
									href="read.php? id='.$row['id'].'"><span class="glyphicon glyphicon-align-left"/>Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success col-sm-3"
								   	href="update.php? id='.$row['id'].'"><span class="glyphicon glyphicon-pencil"/>Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger col-sm-3"
								   	href="delete.php? id='.$row['id'].'"><span class="glyphicon glyphicon-trash"/>Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
				<a href="http://www.startutorial.com/articles/view/php-crud-tutorial-part-1" class="btn btn-success">Tutorial</a>
				<a href="..">Directory</a>
    	</div>
    </div> <!-- /container -->
  </div>
  </body>
</html>
