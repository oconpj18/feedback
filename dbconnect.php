<?
include("./phpincs/p.inc");

$linkID = mysql_connect("localhost", "oconpj18",  $pword);
   if( $linkID == FALSE ){
	   print "Connection to database failed. Please notify the site administrator. <br>";
} //endif

if (mysql_select_db("oconpj18" , $linkID) == FALSE){ 
	   print "The specified database could not be selected. Please notify the site administrator. <br>";
} //endif 
?>
