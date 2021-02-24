<html>
<head>
 <title>Shopping Cart</title>
 <link href="tstore.css" rel="stylesheet" type = "text/css">
</head>
<body>
<h2>My Shopping Cart</h2>


<?php
require_once("database.php");


$prodId = $_POST['Id'];
$invId = $_POST['invId'];
$quantity = '1';

if ($_POST['Id'] <> '')
{
$dbProdRecords = mysql_query("insert into ip values ('$invId', '$prodId', '$quantity')", $dbLocalhost)

   or die("Problem writing to table: " . mysql_error());
//echo "I'm in the loop!";
}

//create table around the information
$dbProdRecords = mysql_query("SELECT InvoiceId, ip.Qty, ThumbNail, Name, Price FROM ip inner join product p on ip.ProductId = p.Id where InvoiceId = '$invId' order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>Invoice Id</td><td>Quantity</td><td>ThumbNail</td><td>Name</td><td>Price</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td><h1>" . $arrProdRecords["InvoiceId"] . "</h1></td> ";
    echo "<td><h2>" . $arrProdRecords["Qty"] . "</h2></td> ";
    echo "<td><img src='img/" . $arrProdRecords["ThumbNail"] . "' width=200></td> ";
    echo "<td><h1>" . $arrProdRecords["Name"] . "</h1></td> ";
    echo "<td><h2>" . $arrProdRecords["Price"] . "</h2></td></tr>";
    $totalprice += $arrProdRecords["Price"];
}
echo "</table>";
$tax = $totalprice * .075;
$grandtotal = $totalprice + $tax;
echo "<h3>Total Price: $totalprice</h3><br>";
echo "<h3>Tax: $tax</h3><br>";
echo "<h3>Grand Total: $grandtotal</h3><br>";


echo "<a href='storeallproducts.php'><img src='img/continue.jpg' width=200></a>";
echo "<form action='storeinvoice.php' method='post'><input type='hidden' name='invId' value='$invId' /><button type='submit'><img src='img/checkout.png' width=200></button></form>";
?>
</body>

</html>