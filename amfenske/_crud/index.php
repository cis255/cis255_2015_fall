<!DOCTYPE html>
<!-- 1. Add image 2. 5 lines of added code 3. Added to bootstrap CSS file-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<link rel='icon' href="https://d13yacurqjgara.cloudfront.net/users/80624/screenshots/848671/create-destroy.gif" />
			<title>Crud Index_AnnaFenske</title>
	<style>
		#svsu {border:dashed; border-color:red;}
		body{background-color: pink}
		div h3{color: purple} <!--header to orange-->
		div p {color: black}		<!--p tags in div to blue-->
		h3 {
			border-style: solid;
			border-color: black;
			}
		th,tr {color: purple}
		

	</style>
</head>

<body>

    <div class="container">
 
    		<div class="row">
    			<h3>CIS 255 Email List</h3>
                <p style="color:black">The purpose of this list is to provide a back end to test front end techniques.</p> <!-- inline css -->
    		</div>
			<div class="row">
				<div class="col-sm-3"> <!-- 2 columns on page -->
					<p>
						<a href="create.php" class="btn btn-success btn-lg">Create</a>
						<img id="svsu" height="100" width="100"src="svsu.jpg" class="img-rounded"> <!-- image with cat1 id -->
					</p>
				
				<table class="table table-bordered">
		              <thead>
		                <tr>
		                  <th style="border:solid">Name</th>
		                  <th style="border:solid">Email Address</th>
		                  <th style="border:solid">Mobile Number</th>
		                  <th style="border:solid">Action</th> <!-- 4 individual inline css lines-->
		                </tr>
		              </thead>
		              <tbody>
		              <tr><td>I'm Wade</td><td>loser@life.com</td><td>684684</td><td width=250><a class="btn" href="read.php?id=46">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=46">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=46">Delete</a></td></tr><tr><td>Frank</td><td>frank@frank.coml</td><td>456</td><td width=250><a class="btn" href="read.php?id=44">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=44">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=44">Delete</a></td></tr><tr><td>Test</td><td>Itestthings@flail.flail</td><td>87979</td><td width=250><a class="btn" href="read.php?id=43">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=43">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=43">Delete</a></td></tr><tr><td>"Butts" Hannigan</td><td>bhhanigan@geocities.net</td><td>1-800-BUTTS</td><td width=250><a class="btn" href="read.php?id=42">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=42">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=42">Delete</a></td></tr><tr><td>test</td><td>test@test.htmln</td><td>test</td><td width=250><a class="btn" href="read.php?id=28">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=28">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=28">Delete</a></td></tr><tr><td>Dave</td><td>adks@htm.com</td><td>899988</td><td width=250><a class="btn" href="read.php?id=27">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=27">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=27">Delete</a></td></tr><tr><td>bbb</td><td>bb@bb.bb</td><td>bbb</td><td width=250><a class="btn" href="read.php?id=21">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=21">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=21">Delete</a></td></tr><tr><td>ant</td><td>ant@and.as</td><td>111</td><td width=250><a class="btn" href="read.php?id=20">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=20">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=20">Delete</a></td></tr><tr><td>fox</td><td>fox@fox.fox</td><td>asd</td><td width=250><a class="btn" href="read.php?id=19">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=19">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=19">Delete</a></td></tr><tr><td>cat</td><td>cat@cat.cat</td><td>CAT</td><td width=250><a class="btn" href="read.php?id=16">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=16">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=16">Delete</a></td></tr><tr><td>Ann</td><td>ann@ann.Ann</td><td>456</td><td width=250><a class="btn" href="read.php?id=15">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=15">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=15">Delete</a></td></tr><tr><td>Jessica</td><td>Todo@aol.com</td><td>666</td><td width=250><a class="btn" href="read.php?id=6">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=6">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=6">Delete</a></td></tr><tr><td>joejoe</td><td>jo@joe.joe</td><td>jojojojojojojo</td><td width=250><a class="btn" href="read.php?id=5">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=5">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=5">Delete</a></td></tr><tr><td>asd</td><td>asdq@asd.asda</td><td>asd</td><td width=250><a class="btn" href="read.php?id=4">Read</a>&nbsp;<a class="btn btn-success" 
								   href="update.php?id=4">Update</a>&nbsp;<a class="btn btn-danger" 
								   href="delete.php?id=4">Delete</a></td></tr>				      </tbody>
	            </table>
				<a href="http://csis.svsu.edu" class="btn btn-primary">CSIS</a>
			</div>
		</div>
    </div> <!-- /container -->
  </body>
</html>
