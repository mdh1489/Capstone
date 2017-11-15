<?php
    //customer-signup.php

    include("../dbase.txt");
    mysql_select_db("huneycuttmd1", $goLocaldb);

    $table = "customer";
	$CustomerE = "select email from customer where email= '" . $_POST[email] . "';";
	$businessE = "select email from business where email= '" . $_POST[email] . "';";
    $result = @mysql_query($CustomerE) or die ("Error Connecting");
	$resultB = @mysql_query($businessE) or die ("Error Connecting");
    if (mysql_num_rows($result) == 0)
	{
		if (mysql_num_rows($resultB) == 0)
		{
			$attributes = "fname, lname, email, password, zipCode";
			$values = "'" . $_POST[fname] . "','";
			$values .= $_POST[lname] . "','" . $_POST[email] . "','";
			$values .= $_POST[password] . "','" . $_POST[zip] . "'";

			$query = "insert into " . $table . " (" . $attributes . ") values (" . $values . ");";
		
			if (!mysql_query($query, $goLocaldb))
			{
				die('Insert Customer Error: ' . mysql_error());
			}	
			$url='login.html';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
		}
		else 
		{
			echo 'Email already exist';
			$url='login.html';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
		}
	}
	else 
	{
		echo 'Email already exist';
		$url='../login.html';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	}
	