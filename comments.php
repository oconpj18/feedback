<?php
ini_set('display_errors', 0);
ini_set('log_errors', 0);
ini_set('error_reporting', E_ALL);

/* THIS CODE NOW COMES FROM session.php:
session_start();

if ($_COOKIE["cis475"] != NULL){
	$_SESSION['user1'] = $HTTP_COOKIE_VARS['cis475'];
	$mycookie = $_SESSION['user1'];
}else{
	$mycookie = "wtf??";
} // END IF COOKIE...

if ($_SESSION['loginattempts'] >= 2){
	print "<meta HTTP-EQUIV='REFRESH' content='0; url=./loginfail.php'>";
}
*/
include ("./phpincs/session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Assignment 2</title>
<link rel="stylesheet" type="text/css" href="../style/style.css" media="screen" />
<style type="text/css">
	.cent {text-align:center}
	img.small {width:20%;}
	img.scaled {width:100%;}
</style>
</head>

<body>
	<div id="header">
		<div id="logo">
			<h1><a href="#">CIS475  </a></h1>
			<p> Fall 2008 - 
				<a href="#">comments</a></p>
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
			<li><a href="../">Home</a></li>
			<li><a href="./music.html">Music</a></li>
			<li><a href="./archives.php">Archives</a></li>
			<li><a href="./comments.php">Guest Book</a></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
		<div id="content">
			<!-- <div class="topimg"><img src="../../images/img07stretch.jpg" alt="" /></div> -->
			<div class="post">
				<!-- <h1 class="title"><a href="#">Wonderwings and Other Fairy Stories by Edith Howes</a></h1>
				<p class="meta">Posted by <a href="#">Author</a> on September 24, 2008
					&nbsp;&bull;&nbsp; <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; <a href="#" class="permalink">Full article</a></p> -->
<?php
include("./phpincs/dbconnect.php");

/*  THIS CODE NOW COMES FROM dbconnect:

include("p.inc");

$linkID = mysql_connect("localhost", "oconpj18",  $pword);
   if( $linkID == FALSE ){
	   print "Connection to database failed. Please notify the site administrator. <br>";
} //endif

if (mysql_select_db("oconpj18" , $linkID) == FALSE){ 
	   print "The specified database could not be selected.. Please notify the site administrator. <br>";
} //endif 
*/		
		
$rowsPerPage = 20;
$pageNum = 1;

if(isset($_GET['page']))
{
	$pageNum = $_GET['page'];
}

$displayset = ($pageNum - 1) * $rowsPerPage;
//print "mycookie = $mycookie";
print "<br /><h1 class='title'>Welcome to guestbook #2</h1>";

$resultID = mysql_query( "SELECT COUNT(timenter) FROM `gbpost`");
 
while($row = mysql_fetch_array($resultID)){
	$recordcount = $row['COUNT(timenter)'];
}

print "<p class='meta'>Comments ($recordcount)</p>
	   <p><br /></p>";

if ($recordcount == 0){
	// echo "<h4>Results</h4>";
	print "<p>Sorry, there are no user viewable entries at this time</p>";
}else{	
	$resultID = mysql_query("SELECT username, timenter, comment FROM `gbpost` ORDER BY timenter DESC 
							 LIMIT $displayset, $rowsPerPage" , $linkID);
	  while ( list ($user, $timent, $comment) = mysql_fetch_row($resultID) ){
		print "<p><div class='subtitle'>$user, $timent: </div><div class='comment'> $comment</div></p>";
	  }
} // END IF RECORDCOUNT

print "<div class='bottomnav'>";

$maxPage = ceil($recordcount/$rowsPerPage);

$self = $_SERVER['PHP_SELF'];
$nav  = '';

for($page = 1; $page <= $maxPage; $page++)
{
   if ($page == $pageNum)
   {
	  $nav .= " $page "; 
   }
   else
   {
	  $nav .= "<a href=\"$self?page=$page\"> $page </a> ";
   } 
}

if ($pageNum > 1)
{
   $page  = $pageNum - 1;
   $prev  = "<a href=\"$self?page=$page\"> [Prev] </a> ";

   $first = "<a href=\"$self?page=1\"> [First Page] </a> ";
} 
else
{
   $prev  = ' &nbsp; '; 
   $first = ' &nbsp; '; 
}

if ($pageNum < $maxPage)
{
   $page = $pageNum + 1;
   $next = "<a href=\"$self?page=$page\"> [Next] </a> ";

   $last = "<a href=\"$self?page=$maxPage\"> [Last Page] </a> ";
} 
else
{
   $next = ' &nbsp; '; 
   $last = ' &nbsp; '; 
}

print $first . $prev . $nav . $next . $last;

print "</div>"; // END BOTTOMNAV

if (isset($_SESSION['user1'])):
	$user = $_SESSION['user1'];
	$error = false;
	$datetime = date('Y-m-d H:i:s');
	
	//echo $datetime;
	
	if ($_POST["write"] == NULL){ ?>
		<form action='<?= $_SERVER['PHP_SELF']; ?>' method = "post">
		<div class="item"><span class="label">Post a comment: </span><span class="input">
		<textarea name="textarea" rows="5" cols="25"></textarea></span></div>
		<input type="submit" value="write" name="write" />
		</form>
	<?
	}else{
		if( trim($_POST['textarea']) == NULL){  
				$error= true;
		}
	
		if($error){  ?>
			<form action='<?= $_SERVER['PHP_SELF']; ?>' method = "post">
			<div class="item"><span class="label">Post a comment: </span><span class="input">
			<textarea name="textarea" rows="5" cols="25"></textarea></span></div>
			<input type="submit" value="write" name="write" />
			<span style='color:#ff0000'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ERROR: Please enter a comment.</span><br />		
			</form>
	<?	}elseif(!$error){
			$comment = trim($_POST['textarea']);
	//		echo $date;
	//		echo $comment;
			mysql_query("INSERT INTO gbpost (username, timenter, comment) VALUES ('$user', '$datetime', '$comment')");
			print "<meta HTTP-EQUIV='REFRESH' content='0; url=comments.php'>";	
		} // END IF ERROR
		
	} // END IF FORM POST = NULL
endif; // END IF SESSION...

mysql_close($linkID); 
?>	  


				<div class="entry">
					<p><br /><br /></p>				
				</div>
				<!-- end #entry -->	
			</div>
			<!-- end #post -->			
		</div>
		<!-- end #content -->
		
		<div id="sidebar">
<? //include ("./phpincs/sidebar.php");
include ("./phpincs/sitemap.php");
include ("./phpincs/activesidebar.php");
?>
		</div>
		<!-- end #sidebar -->

		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
</div>
<div id="footer">
	<p>Copyright (c) 2008 Sitename.com. All rights reserved. Original template design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>. Site design by Peter J. O'Connor, Jr.</p>
</div>
<!-- end #footer -->
</body>
</html>
