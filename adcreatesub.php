<?php
    session_start();

    include("dbase.txt");
    mysql_select_db("huneycuttmd1", $goLocaldb);
	$table = "ad";
	$attributes = "busID, zipCo, date, displayLength, text";
	$values = "'" . $_SESSION['businessID'] . "','" . $_SESSION['zip'] . "','" ;
	$values .= $_POST[date] . "','" . $_POST[demo] . "','";
	$values .= $_POST[text] . "'";

	$query = "insert into " . $table . " (" . $attributes . ") values (" . $values . ");";
	if (!mysql_query($query, $goLocaldb))
	{
		die('Insert Customer Error: ' . mysql_error());
			echo 'Ad not submitted';
			$url='adcreate.php';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	}	
	$url='bizportal.php';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';