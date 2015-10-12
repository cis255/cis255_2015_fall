<!DOCTYPE html>
<html lang="en">

<head>

<!--  Note: this page has working links to other pages, but those pages are not commented and the content is the stock content from bootstrap 
					pages include (contact.html, post.html, about.html)
	author: Joshua Walters, cis 255, fall 2015
	purpose: to create a web page (or site in this case) to demonstrate we know how to use css and bootstrap in a site. 
				we do this by editing existing php files, 
	description:
		Assignment Requirements:
			1._crud folder manipulation was performed in class
			2.css/php files were edited to personalize my webPage
			3. in my clean-blog_min.css folder when i link to my font squirl fonts i use ..(relative referencing) to get to the font files
				i used absolute referencing in the about me link to go to my cis255 folder on the server
			4. 	external css is used all over the place in this page 
				internal css is used -- in the head section
				in line is used -- search for ""inline css""
			5. i actually had to go into the css of a few different classes in the css files and modify the margins to fit right	
				infact the buttons gave me the most trouble because they were to big and stagered.. so i searched for btn in the css file
				and just adjusted the padding so they were on one line instead of wrapping down. 
				-- use/change 20 bootstrap tags-- ... check!
			6. -- use important tag-- check
			
			7. there are several class and element selectors in the css files that i personally edited such as .btn .tbody and body
				
			8. location is the trickies part of my css links for example when i tried to edit the button size i was doing it in the wrong
				file at first and then had to go to the clean.blah.blah css file to change it, as well as the fonts.
				specificity was also a pain in this site because there were already so many EXTREAMLY specific settings in the bootstrap
				it was hard to understand how to change a certian element, since i didnt write the css i had to atleast skim it to figure out things
				inhearitance was not as difficult in this site the biggest was when i was changing the font using fontsquirl and had to change most 
				itterations of font-family to get the font to change everywere i decided to change all locations of font family to be safe!
			
			9. -- add images-- not sure what you ment by the 5 files but i used paint.net and gimp to create my own custmo banner the same
								dimmentions as the stock one, plus i did that for a all the pages about ect. and added the icons so i hope thats what you meant 
			10.	
			extra: btn class was changed to fit in the same line in the table, this gave me a lot of trouble 
				content was changed, to represent my podcast starting in a few weeks.
				font was customly changed using font squirl
	-->
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>League of Extraordinary Nerds</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
	<style>
	#MasterContainer {border-style:solid; border-color: white;}
	h4 { color: #A9A9A9; !important}
	</style>
</head>

<body>
	<div id="MasterContainer">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Start Bootstrap</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><!-- 1.this class indecates the menu bar at the top of the page, it collapses when you scroll down 
																							but reapears if you sroll up-->
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="http://csis.svsu.edu/~jmwalter/cis255/jmwalter/jmwalter.html">About</a> <!-- used to be about.html .. but i figured i could link it to my dir in the server-->
						</li>
						<li>
							<a href="post.html">Sample Post</a>
						</li>
						<li>
							<a href="contact.html">Contact</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>

		<!-- Page Header -->
		<!-- Set your background image for this header on the line below. -->
		<header class="intro-header" style="background-image: url('img/website_bannor.png')"><!--2. this class is used primarally to deal with the banner image -->
			<div class="container"><!--3. the container class is used in all bootstrap and all boot strap css must be wrapped in it -->
				<div class="row"><!--4. boot strap uses rows and collumns to make a "pretty" website row class creates a new row in a div -->
					<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"><!--5. here we are saying column large 8/12=1 so one colun if screen is large offset is not clear what it does -->
						<div class="site-heading"> <!--6. BIG INTRO this is where the name of your site will go and some big attention grabbing graphics maybe -->
							<h1>The League of Extraordinary Nerds</h1>
							<hr class="small">
							<span class="subheading">Three unquallified nerds bring you news, reviews and nerd rage all in one podcast</span>
						</div> <!--7. subheadings is where maybe a quick snipit would be, or your company mission statment -->
					</div>
				</div>
			</div>
		</header>

		<!-- Main Content -->
		<div class="container"><!--8. because we closed the last container div we must open an new one -->
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"><!--9. more formatting class col stuff -->
					<div class="post-preview"><!--10. what this post-preview class and the a tag under it are doing is making the intire title/subtitle/and date/ in a div and a link to that particular post -->
						<a href="post.html">
							<h2 class="post-title"><!--11. larger text, ment to get your attention and inform the reader what the title of the blog post is  -->
								Fall tv reviews, upcoming movies, wrestling this week, and countdown to Star Wars!
							</h2>
							<h3 class="post-subtitle"> <!--12. subtitle is for the caption or brief explanation for the title, it is set to be smaller text then the heading -->
								First post, introductions and resumes?
							</h3>
						</a>
						<p class="post-meta">Posted by <a href="#">The League</a> on September 24, 2015</p><!--13. this class is set to make text italisized for date and author.   -->
					</div>
					<hr>
					<div class="post-preview">
						<a href="post.html">
							<h2 class="post-title">
								Dc vs Marvel, "hey Matt Damon, save some water for California. 
							</h2>
						</a>
						<p class="post-meta">Posted by <a href="#">The League</a> on September 18, 2015</p>
					</div>
					<hr>
					<div class="post-preview">
						<a href="post.html">
							<h2 class="post-title">
								yet untintled comedy GOLD.. boom!!!!
							</h2>
							<h3 class="post-subtitle">
								Three idiots and a micraphone... what else to say.
							</h3>
						</a>
						<p class="post-meta">Posted by <a href="#">The League</a> on August 24, 2015</p>
					</div>
					<hr>
					<div class="post-preview">
						<a href="post.html">
							<h2 class="post-title">
								Failure is not an option
							</h2>
							<h3 class="post-subtitle">
								Derp1, derp2, derp3... i dont even know anymore 
							</h3>
						</a>
						<p class="post-meta">Posted by <a href="#">The League</a> on July 8, 2015</p>
					</div>
					<hr>
					<!-- Pager -->
					<ul class="pager"> <!--14. even though i am not super familiar to pager or paging systems, from the context and the button this will setup numbered pages for older posts -->
						<li class="next"><!--15.setting up the a tag under to go to the next page of posts -->
							<a href="#">Older Posts &rarr;</a><!--16. i am assuming that if i wanted to expand on this site i would need to write a previous first and last button too -->
						</li>
					</ul>
				</div>
			</div>
			<!--the following code is the code for the email list.-->
							<div class="row" >
								<h3 style="font-style: italic;">The league Listiners Email List</h3> <!--inline css-->
								<h4>Current email list to all listiners of the league of Extraordinary Nerds podcast.</h4>
							</div>
							<div class="row">
								<p>
									<a href="create.php" class="btn btn-success"><img src="img/create_icon.png" alt="create">Create</a>
								</p>
								
								<table class="table table-striped table-bordered"><!--17. this class sets up a table with every other row being of a different color giving it depth and character -->
									  <thead>
										<tr>
										  <th>Name</th>
										  <th>Email Address</th>
										  <th>Mobile Number</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody><!-- holy php batman!!! -->
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
												   $row['id'].'"><img src="img/read_icon.png" alt="read">Read</a>';
												echo '&nbsp;';
												echo '<a class="btn btn-success" 
												   href="update.php?id='.$row['id'].'"><img src="img/update_icon.png" alt="update">Update</a>';
												echo '&nbsp;';
												echo '<a class="btn btn-danger" 
												   href="delete.php?id='.$row['id'].'"><img src="img/delete_icon.png" alt="delete">Delete</a>';
												echo '</td>';
												echo '</tr>';
									   }
									   Database::disconnect();
									  ?>
									  </tbody>
									  
								</table>
						</div>
						
				</div>		
			
		

		<hr>

		<!-- Footer -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
						<ul class="list-inline text-center"> <!--18. setting up the formating for the links at the bottom -->
							<li>
								<a href="#">
									<span class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x"></i> <!--19. they dont work well with the table at the bottom but 
																					these couple of classes are for the twitter/facebook links at the botom of the page-->
										<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-github fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</li>
						</ul>
						<p class="copyright text-muted">Copyright &copy; Your Website 2014</p><!--20. makes the text small like a footer or fineprint -->
				</div>
			
			</div>
		</footer>

		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="js/clean-blog.min.js"></script>
	</div>
</body>

</html>
