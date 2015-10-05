<!DOCTYPE html>

<!--  Author: Allison Klinesmith
  Purpose: to test front end design with provided, back end code, and to test understanding of CSS and bootstrap 
  Design:
  The specs are below.
 
 1. Copy the entire "_crud" directory recursively into your subdirectory. For example, after you position yourself in the correct directory, type "mkdir _crud" and "cp –R ../_crud01/* _crud". If you don't know how to copy files and directories in Linux, please learn this. This was supposed to be a prerequisite for this course. If you can't figure it out on your own, please come to my office hours ASAP!!!
 2. Inside the subdirectory, you will find 6 files with the extension, .php. You will NOT change database.php, but you will change the other 5 files. Change the HTML/CSS part of the code, not the PHP part of the code (unless you want extra credit). Use your own custom CSS/Bootstrap.
 3. Use relative referencing and absolute referencing when linking to external CSS files. Use double periods ".." in at least one of your references and put a numbered comment next to it so I can find it.
 4. Use in-line, internal (embedded) and external CSS.
 5. Use at least 20 Bootstrap classes and comment them to show you understand what they do.
 6. Use the "!important" attribute to override a Bootstrap class.
 7. Use at least one of each of the following: an ID selector, a CLASS selector, an ELEMENT selector, an attribute selector and a pseudo selector.
 8. Comment in your code at least one of each of the following: how your CSS execution is affected by (a) inheritance, (b) specificity, and (c) location.
 9. Add an image to each of the 5 files.
 10. Change all buttons to include appropriate glyph-icons.

 #3, #7, #4, #5, and #6 of design is within comments below
 -->
 

<html lang="en">
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	

    <title>Prog2- Allison Klinesmith</title>

    <!-- Bootstrap Core CSS -->
	<!-- #3 Relative reference -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
	<!-- #3; ".." notation relative referencing-->
    <link href="../_crud/css/simple-sidebar.css" rel="stylesheet">
	
	<!-- #7 element selector. #6 !important attribute to override bootstrap. #4 internal -->
	<style>
	
		h3{font-weight: bold !important;}
	</style>

	
</head>



<body>

<div id="wrapper">
		<!-- CSS and wrapper code from StartBootstrap-simple-sidebar-->
        <!-- Sidebar -->
		<!-- #4 inline styling; inline overrides CSS bootstrap -->
        <div id="sidebar-wrapper" style="background: #23425b">
			<!-- #7 (1): class side-bar nav formats all list items in the sidebar-wrapper-->
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Quick Links
                    </a>
                </li>
                <li>
                    <a href="http://www.svsu.edu/">SVSU.edu</a>
                </li>
                <li>
                    <a href="http://csis.svsu.edu/~arklines/cis255/arklines/arklines.html">Assignments menu</a>
                </li>
                <li>
                    <a href="https://github.com/arklines">Github Account</a>
                </li>
                <li>
                    <a href="http://startbootstrap.com/template-categories/all/">Free Bootstrap Templates</a>
                </li>
                <li>
                    <a href="http://startbootstrap.com/template-overviews/simple-sidebar/">Template Used</a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->


		
		
		<!-- content -->
		<!--  wraps content in format of the content for the simple sidebar -->
	<div id="page-content-wrapper">
	<!-- #5 (2) content of the page is fluid so that it adapts to the collapsible sidebar-->
    <div class="container-fluid">
				<!-- #5 (3) added class to format header-->
    			<h3 class="header page-header">CIS 255 Email List</h3>
				<!-- ID Puprose will be changed via an id selector in bootstrap.CSS -->
                <p id="Purpose">The purpose of this list is to provide a back end to test front end techniques.</p>
    		
			<!-- #5 (4) formats row column and margin sizes-->
			<div class="row">
				<p>
					<!-- #5 (5) changed class from button success to button primary. Primary button in bootstrap has specs background-color:#337ab7;border-color:#2e6da4-->
					<!-- Trigger the modal with a button; Code from example in Weebly site -->
					<a class="btn btn-primary" href="create.php" > Create</a>
					
				</p>
				<!-- #5 (6) table-bordered-thick gives a 2px shadow to the bottom-right sides of the table -->
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
							   	echo '<a class="btn btn-danger"
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
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
    	</div>
		
		
		
		 

 
	
	
	
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	
	
	
	
  
  </script>
	
    </script>	
	
	
	

  </body>
</html>
