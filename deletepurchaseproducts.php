<html>
<head>
 <title>Lab 03</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

Purchase ID to DELETE: <input type="text" name="PurchaseId" />  Product ID to DELETE: <input type="text" name="ProductId" />

<input type="submit" value="Delete Record"/>
</form>

<?php
require_once("database.php");
$deletePurchase = $_POST['PurchaseId'];
$deleteProduct = $_POST['ProductId'];

if (($_POST['PurchaseId'] <> '') && ($_POST['ProductId'] <> ''))
{
$dbProdRecords = mysql_query("delete from purchaseproducts where purchases_Id = '$deletePurchase' and products_Id = '$deleteProduct'", $dbLocalhost)

   or die("Problem writing to table: " . mysql_error());
//echo "I'm in the loop!";
}
else
{
  echo "Please enter both values!";
}

//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM purchaseproducts  order by 1", $dbLocalhost)
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
<a href="lab03.php"><img src="img/three.jpg"></a>
</body>

</html>