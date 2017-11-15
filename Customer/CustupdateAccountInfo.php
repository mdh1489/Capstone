<?php 
	session_start();
	include("../dbase.txt");
	if(!isset($_SESSION['name'])){ //if login in session is not set
	header("Location: login.html");}
	mysql_select_db("huneycuttmd1", $goLocaldb);
	$email = $_POST['email'];
	$zipy = $_POST['zip'];
	$_SESSION['zip'] = $_POST['zip'];
	$zip = 'UPDATE customer SET zipCode = "'. $zipy . '" where email = "'.$email.'";';
	@mysql_query($zip) or die(mysql_error()); 
	echo '<META HTTP-EQUIV=REFRESH CONTENT="1; custaccount.php?'.SID.'">';
 ?>