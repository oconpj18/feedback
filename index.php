<?php
ini_set('display_errors', 0);
ini_set('log_errors', 0);
ini_set('error_reporting', E_ALL);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Form Validation</title>
<link rel="stylesheet" type="text/css" href="../../style/style.css" media="screen" />
<style type="text/css">
	.cent {text-align:center}
</style>
</head>

<body>
	<div id="header">
		<div id="logo">
			<h1><a href="#">CIS475 </a></h1>
			<p> Fall 2008 -
				<a href="#"> Website Feedback</a></p>
		</div>
		<!-- <div id="search">
			<form method="get" action="">
				<fieldset>
				<input id="search-text" type="text" name="s" value="Search" size="15" />
				<input type="submit" id="search-submit" value="Search" />
				</fieldset>
			</form>
		</div> -->
		<!-- end #search -->
	</div>
	<!-- end #header -->
<div id="wrapper">
<div id="wrapper2">
	<div id="menu">
		<ul>
			<li><a href="../../">Home</a></li>
			<li><a href="../story/">Story</a></li>
			<li><a href="./">Form Validation</a></li>
			<li><a href="../guest/">Guest Book</a></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
		<div id="content">
			<!-- <div class="topimg"><img src="../../images/img07stretch.jpg" alt="" /></div> -->
			<div class="post">
				<h1 class="title"><a href="#">Website Feedback</a></h1>
				<p class="meta">Posted by <a href="#">Author</a> on September 24, 2008
					&nbsp;&bull;&nbsp; <a href="#" class="comments">Comments (64)</a> <!--  &nbsp;&bull;&nbsp; <a href="#" class="permalink">Full article --></a></p>
				<div class="entry">
<!-- <p><br /></p> -->

<?  include ("form.php" ); ?>

				</div>
			</div>				
		</div>
		<!-- end #content -->
		
		<div id="sidebar">
			<ul>
				<li>
					<h2>Brief</h2>
					<ul>
						<li><a href="../../">Home</a></li>
						<li><a href="../story/">Story</a></li>
						<li><a href="./">Form Validation</a></li>
						<li><a href="../guest/">Guest Book</a></li>			
					</ul>
				</li>
				<li>
					<h2>General</h2>
					<ul>
						<li><a href="http://www.buffalostate.edu/cis/">cis department</a></li>
						<li><a href="http://www.buffalostate.edu/">buffalo state college</a></li>
						<li><a href="http://www.oswd.org/">os web design</a></li>
					</ul>
				</li>
				<li>
					<h2>Archives</h2>
					<ul>
						<li><a href="#">December 2007</a>&nbsp;(29)</li>
						<li><a href="#">November 2007</a>&nbsp;(30)</li>
						<li><a href="#">October 2007</a>&nbsp;(31)</li>
						<li><a href="#">September 2007</a>&nbsp;(30)</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
</div>
<div id="footer">
	<p>Copyright (c) 2008 Whateversitename.com. All rights reserved. Site design by Peter J. O'Connor, Jr.</p>
</div>
<!-- end #footer --></body>
</html>
