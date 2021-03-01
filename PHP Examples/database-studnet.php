<?php
    $dbLocalhost = mysql_connect("localhost", "fotinfo_stuCC", "EM420CTU")
	   or die("Could not connect: " . mysql_error());
	mysql_select_db("fotinfo_studentC", $dbLocalhost)
	or die("Could not find database: " . mysql_error());

?>

