<?php
    //insertbusiness.php

    include("dbase.txt");
    mysql_select_db("huneycuttmd1", $goLocaldb);

    $table = "business";
	$CustomerE = "select email from customer where email= '" . $_POST[email] . "';";
	$businessE = "select email from business where email= '" . $_POST[email] . "';";
    $result = @mysql_query($CustomerE) or die ("Error Connecting");
	$resultB = @mysql_query($businessE) or die ("Error Connecting");
    if (mysql_num_rows($result) == 0)
	{
		if (mysql_num_rows($resultB) == 0)
		{
			$attributes = "name, email, industry, address, zipCode, password, telephone";
			$values = "'" . $_POST[name] . "','";
			$values .= $_POST[email] . "','" . $_POST[industry] . "','" . $_POST[address] . "','";
			$values .= $_POST[zip] . "','" . $_POST[password] . "','" . $_POST[phone] . "'";

			$query = "insert into " . $table . " (" . $attributes . ") values (" . $values . ");";
		
			if (!mysql_query($query, $goLocaldb))
			{
				die('Insert Business Error: ' . mysql_error());
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
		$url='login.html';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	}
	
