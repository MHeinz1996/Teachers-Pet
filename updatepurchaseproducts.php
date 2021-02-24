<html>
<head>
 <title>Lab 03</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

<h2>Update Purchase Products<h2>
Product ID: <input type="text" name="prodId" />
Invoice ID: <input type="text" name="purchId" />
Cost: <input type="text" name="cost" />
Quantity: <input type="text" name="qty" />

<input type="submit" value="Update Purchase Products" name="submit"/>
</form>

<?php
require_once("database.php");
$prodId = $_POST['prodId'];
$purchId = $_POST['purchId'];
$icost = $_POST['cost'];
$iqty = $_POST['qty'];

if (isset($_POST['submit']))
{
$dbProdRecords = mysql_query("update purchaseproducts set Cost = '$icost', Quantity = '$iqty' where products_Id = '$prodId' and purchases_Id = '$purchId'", $dbLocalhost)

   or die("Problem writing to table: " . mysql_error());
//echo "I'm in the loop!";
}

//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM purchaseproducts order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>Product ID</td><td>Invoice Id</td><td>Cost</td><td>Quantity</td></tr>";
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