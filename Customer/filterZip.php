<?php 
	session_start();
	include("../dbase.txt");
	if(!isset($_SESSION['name'])){ //if login in session is not set
	header("Location: login.html");}
	mysql_select_db("huneycuttmd1", $goLocaldb);
	$_SESSION['zip'] = $_POST['zip'];
	echo '<META HTTP-EQUIV=REFRESH CONTENT="1; custportal.php?'.SID.'">';
 ?>