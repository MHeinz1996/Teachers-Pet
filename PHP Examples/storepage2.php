<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
   http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Rob's Used Yachts</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<link href="../CSS/ch9cssv1.css" rel="stylesheet" type = "text/css">

</head>

<body>

<?php

require_once("database.php");

$myId=$_POST[$tempId];

echo $myId;

Echo "<h1 align=center>Rob's Used Yachts</h1>";

Echo "<h2 align=center>Product Details</h2>";

$dbRecords = mysql_query("SELECT * from product where Id='$myId' ", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());

echo "<table cellpadding = 10>";

echo "<tr> <th>Picture</th> <th>Description</th> </tr>";

while ($arrRecords = mysql_fetch_array($dbRecords)) {
    echo "<tr>";
    echo "<td><IMG src='IMG/".$arrRecords["Picture"] . "'></td>";
    echo "<td>".$arrRecords["Descr"] . "</td>";
    echo "<td><input type='submit' name='addtocart' value='Add To Cart'/></td>";
    echo "</tr>";

}
echo "</table>";


if ($_POST[addtocart] <> '')



?>

</body>
</html>