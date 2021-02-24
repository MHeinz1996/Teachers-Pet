<html>
<head>
 <title>Lab 03</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>
<?php
require_once("database.php");
$dbProdRecords = mysql_query("SELECT * FROM purchases order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>ID</td><td>CustID</td><td>Month</td><td>Day</td><td>Year</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td>" . $arrProdRecords["Id"] . "</td> ";
    echo "<td>" . $arrProdRecords["customers_Id"] . "</td> ";
    echo "<td>" . $arrProdRecords["Month"] . "</td> ";
    echo "<td>" . $arrProdRecords["Day"] . "</td> ";
    echo "<td>" . $arrProdRecords["Year"] . "</td></tr>";
}
echo "</table>";
?>
<a href="index.php"><img src="img/home.png"></a>
<a href="lab03.php"><img src="img/three.jpg"></a>
</body>
</html>