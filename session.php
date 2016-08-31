<?
session_start();

if (isset($_COOKIE["cis475"])){
	if ($_COOKIE["cis475"] != NULL){
		$_SESSION['user1'] = $HTTP_COOKIE_VARS['cis475'];
		$mycookie = $_SESSION['user1'];
	}else{
		$mycookie = "OOPS";
	} // END IF COOKIE...
} // END IF ISSET...

if (isset($_SESSION['loginattempts'])){
	if ($_SESSION['loginattempts'] >= 2){
		print "<meta HTTP-EQUIV='REFRESH' content='0; url=loginfail.php'>";
	}	
} // END IF ISSET...

?>
