<html>
<head>
 <title>Lab 04</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>
<h2>View Ip (Invoice Product)</h2>
<?php
require_once("database.php");
//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM ip order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>Invoice Id</td><td>Product Id</td><td>Quantity</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td>" . $arrProdRecords["InvoiceId"] . "</td> ";
    echo "<td>" . $arrProdRecords["ProductId"] . "</td> ";
    echo "<td>" . $arrProdRecords["Qty"] . "</td></tr>";
}
echo "</table>";


?>
<a href="index.php"><img src="img/home.png"></a>
<a href="lab04.php"><img src="img/four.png"></a>
</body>

</html>