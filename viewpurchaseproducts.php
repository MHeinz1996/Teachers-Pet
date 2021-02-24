<html>
<head>
 <title>Lab 03</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>
<?php
require_once("database.php");
$dbProdRecords = mysql_query("SELECT * FROM purchaseproducts order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>Product ID</td><td>Purchase ID</td><td>Cost</td><td>Quantity</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td>" . $arrProdRecords["products_Id"] . "</td> ";
    echo "<td>" . $arrProdRecords["purchases_Id"] . "</td> ";
    echo "<td>" . $arrProdRecords["Cost"] . "</td> ";
    echo "<td>" . $arrProdRecords["Quantity"] . "</td></tr>";
}
echo "</table>";
?>
<a href="index.php"><img src="img/home.png"></a>
<a href="lab3.php"><img src="img/three.jpg"></a>
</body>
</html>