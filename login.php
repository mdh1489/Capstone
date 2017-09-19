<?php
    //login.php

    include("dbase.txt");
    mysql_select_db("huneycuttmd1", $goLocaldb);

	$businessE = "select email, password from business where email= '" . $_POST[email] . "' and password = '". $_POST[password] . "';";
    $result = @mysql_query($businessE) or die ("Error Connecting");
	$customerE = "select email, password from customer where email= '" . $_POST[email] . "' and password = '". $_POST[password] . "';";
    $resultC = @mysql_query($customerE) or die ("Error Connecting");
    if (!(mysql_num_rows($result) == 0))
	{
		echo 'BUSINESS PERMISSION GRANTED';
		$url='login.html';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	}
	else if (!(mysql_num_rows($resultC) == 0))
	{
		echo 'CUSTOMER PERMISSION GRANTED';
		$url='login.html';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	}
	
	else
	{
		echo 'PERMISSION DENIED';
		$url='login.html';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	}