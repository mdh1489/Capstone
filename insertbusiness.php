<?php
    //insertOutreaches.php

    include("dbase.txt");
    mysql_select_db("huneycuttmd1", $goLocaldb);

    $table = "business";

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
