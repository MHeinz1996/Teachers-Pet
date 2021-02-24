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
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<p>" . $arrProdRecords["Id"] . " ";
    echo $arrProdRecords["Name"] . " ";
    echo $arrProdRecords["Description"] . " ";
    echo $arrProdRecords["Quantity"] . " ";
    echo $arrProdRecords["Cost"] . "</p>";
}
?>
<a href="index.php"><img src="img/home.png"></a>
<a href="lab03.php"><img src="img/three.jpg"></a>
</body>
</html>