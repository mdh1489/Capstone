<?php 
	session_start();
	include("../dbase.txt");
	if(!isset($_SESSION['name'])){ //if login in session is not set
	header("Location: ../login.html");}
	mysql_select_db("huneycuttmd1", $goLocaldb);
	$tely = $_POST['telephone'];
	$email = $_POST['email'];
	$_SESSION['zip'] = $_POST['zip'];
	$addy = $_POST['add'];
	$zip = 'UPDATE business SET zipCode = "'. $_POST['zip'] . '" where email = "'.$email.'";';
	$tel = 'UPDATE business SET telephone = "'. $tely . '" where email = "'.$email.'";';
	$add = 'UPDATE business SET address = "'. $addy . '" where email = "'.$email.'";';
	//$zip = 'UPDATE business SET zipCode = "'. $zipy . '" where email = "'.$email.'";';
	@mysql_query($tel) or die(mysql_error()); 
	@mysql_query($add) or die(mysql_error()); 
	@mysql_query($zip) or die(mysql_error()); 
	echo '<META HTTP-EQUIV=REFRESH CONTENT="1; bizaccount.php?'.SID.'">';
 ?>