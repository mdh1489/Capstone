<?php
    session_start();
    //login.php

    include("dbase.txt");
    mysql_select_db("huneycuttmd1", $goLocaldb);

	$businessE = "select email, password from business where email= '" . $_POST[email] . "' and password = '". $_POST[password] . "';";
    $result = @mysql_query($businessE) or die ("Error Connecting");
	$customerE = "select email, password from customer where email= '" . $_POST[email] . "' and password = '". $_POST[password] . "';";
    $resultC = @mysql_query($customerE) or die ("Error Connecting");
    if (!(mysql_num_rows($result) == 0))
	{
		$businessName = @mysql_fetch_array(@mysql_query("select Name from business where email= '" . $_POST[email] . "';"));
		$businessID = @mysql_fetch_array(@mysql_query("select business_ID from business where email= '" . $_POST[email] . "';"));
		$businessZip = @mysql_fetch_array(@mysql_query("select zipCode from business where email= '" . $_POST[email] . "';"));
		$_SESSION['businessID'] = $businessID[0];
		$_SESSION['name'] = $businessName[0];
		$_SESSION['zip'] = $businessZip[0];
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; bizportal.php?'.SID.'">';
	}
	else if (!(mysql_num_rows($resultC) == 0))
	{
		$customerName = @mysql_fetch_array(@mysql_query("select fname from customer where email= '" . $_POST[email] . "';"));
		$customerZip = @mysql_fetch_array(@mysql_query("select zipCode from customer where email= '" . $_POST[email] . "';"));
		$_SESSION['name'] = $customerName[0];
		$_SESSION['email'] = $_POST[email];
		$_SESSION['zip'] = $customerZip[0];
		$url='custportal.html';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; custportal.php?'.SID.'">';
	}
	
	else
	{
		echo 'PERMISSION DENIED';
		$url='login.html';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	}