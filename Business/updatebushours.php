<?php 
	session_start();
	include("../dbase.txt");
	if(!isset($_SESSION['name'])){ //if login in session is not set
	header("Location: ../login.html");}
	mysql_select_db("huneycuttmd1", $goLocaldb);
	$sunday = $_POST['sunday'];
	$monday = $_POST['monday'];
	$tuesday = $_POST['tuesday'];
	$wednesday = $_POST['wednesday'];
	$thursday = $_POST['thursday'];
	$friday = $_POST['friday'];
	$saturday = $_POST['saturday'];
	$email = $_POST['email'];
	$sun = 'UPDATE business SET Sunhours = "'. $sunday . '" where email = "'.$email.'";';
	$mon = 'UPDATE business SET Monhours = "'. $monday . '" where email = "'.$email.'";';
	$tues = 'UPDATE business SET Tueshours = "'. $tuesday . '" where email = "'.$email.'";';
	$wed = 'UPDATE business SET Wedhours = "'. $wednesday . '" where email = "'.$email.'";';
	$thurs = 'UPDATE business SET Thurshours = "'. $thursday . '" where email = "'.$email.'";';
	$fri = 'UPDATE business SET Frihours = "'. $friday . '" where email = "'.$email.'";';
	$sat = 'UPDATE business SET Sathours = "'. $saturday . '" where email = "'.$email.'";';
	//$zip = 'UPDATE business SET zipCode = "'. $zipy . '" where email = "'.$email.'";';
	@mysql_query($sun) or die(mysql_error()); 
	@mysql_query($mon) or die(mysql_error()); 
	@mysql_query($tues) or die(mysql_error()); 
	@mysql_query($wed) or die(mysql_error()); 
	@mysql_query($thurs) or die(mysql_error()); 
	@mysql_query($fri) or die(mysql_error());
	@mysql_query($sat) or die(mysql_error());
	echo '<META HTTP-EQUIV=REFRESH CONTENT="1; bizaccount.php?'.SID.'">';
 ?>