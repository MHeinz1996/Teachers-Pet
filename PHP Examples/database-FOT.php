<?php
    $dbLocalhost = mysql_connect("localhost", "fotinfo_tchris", "EM420CTU")
	   or die("Could not connect: " . mysql_error());
	mysql_select_db("fotinfo_tchris", $dbLocalhost)
	or die("Could not find database: " . mysql_error());

?>

