<?php
    $dbLocalhost = mysql_connect("ctutgardnernet.ipagemysql.com", "tchris", "d43edjuhme")
	   or die("Could not connect: " . mysql_error());
	mysql_select_db("tchris", $dbLocalhost)
	or die("Could not find database: " . mysql_error());
?>
