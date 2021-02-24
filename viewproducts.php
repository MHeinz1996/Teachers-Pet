<html>
<head>
 <title>Lab 03</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>
<?php
require_once("database.php");
$dbProdRecords = mysql_query("SELECT * FROM products order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>ID</td><td>Name</td><td>Description</td><td>Qty</td><td>Cost</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td>" . $arrProdRecords["Id"] . "</td> ";
    echo "<td>" . $arrProdRecords["Name"] . "</td> ";
    echo "<td>" . $arrProdRecords["Decription"] . "</td> ";
    echo "<td>" . $arrProdRecords["Quantity"] . "</td> ";
    echo "<td>" . $arrProdRecords["Cost"] . "</td></tr>";
}
echo "</table>";
?>
<a href="index.php"><img src="img/home.png"></a>
<a href="lab03.php"><img src="img/three.jpg"></a>
</body>
</html>