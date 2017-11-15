<?php 
	session_start();
	include("../dbase.txt");
	if(!isset($_SESSION['name'])){ //if login in session is not set
	header("Location: ../login.html");}
	mysql_select_db("huneycuttmd1", $goLocaldb);
	$adID = $_POST['adID'];
	deleteRow($adID);
  	function deleteRow($adID)
	{
		
		$q1 = "DELETE FROM ad where AdID= '". $adID . "';";
		@mysql_query($q1) or die(mysql_error()); 
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; bizportal.php?'.SID.'">';
	}
 ?>