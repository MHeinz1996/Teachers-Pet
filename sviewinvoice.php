<html>
<head>
 <title>Lab 04</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>
<h2>View Invoice</h2>
<?php
require_once("database.php");
//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM invoice order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>Id</td><td>CustId</td><td>Order Date</td><td>Ship Date</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td>" . $arrProdRecords["Id"] . "</td> ";
    echo "<td>" . $arrProdRecords["CustId"] . "</td> ";
    echo "<td>" . $arrProdRecords["OrderDate"] . "</td> ";
    echo "<td>" . $arrProdRecords["ShipDate"] . "</td></tr>";
}
echo "</table>";


?>
<a href="index.php"><img src="img/home.png"></a>
<a href="lab04.php"><img src="img/four.png"></a>
</body>

</html>