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

Echo "<h1 align=center>Rob's Used Yachts</h1>";

Echo "<h2 align=center>Welcome to Rob's used yacht store!  I'm sure I have what you are looking for!</h2>";

$dbRecords = mysql_query("SELECT Id, Name, Descr, Price, Thumbnail, Qty from product", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());

echo "<table cellpadding = 10>";

echo "<tr> <th>Thumbnail</th> <th>Name</th> <th>Price</th> <th>Qty</th> </tr>";

while ($arrRecords = mysql_fetch_array($dbRecords)) {
    $tempId=$arrRecords["Id"];
    echo "<tr>";
    echo "<td><IMG src='IMG/".$arrRecords["Thumbnail"] . "'></td>";
    echo "<td>".$arrRecords["Name"] . "</td>";
    echo "<td>".$arrRecords["Price"] . "</td>";
    echo "<td>".$arrRecords["Qty"] . "</td>";
    echo "<td><form action='storepage2.php'> <input type='submit' name='$tempId' value='More Info'/></form> </td>";
    echo "</tr>";

}
echo "</table>";


if ($_POST[$tempId] <> '')



?>

</body>
</html>