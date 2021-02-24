<html>
<head>
 <title>Shopping Cart</title>
 <link href="tstore.css" rel="stylesheet" type = "text/css">
</head>
<body>
<h2>Confirm Order</h2>


<?php
require_once("database.php");
$invId = $_POST['invId'];

$dbProdRecords = mysql_query("select Title, FName, LName, Addy, City, State, Zip, phone, email from customer c inner join invoice i on i.custid = c.id where i.id = '$invId'", $dbLocalhost)
   or die("Problem writing to table: " . mysql_error());
echo "<table>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)){
    echo "<tr><h1>".$arrProdRecords["Title"]." ".$arrProdRecords["FName"]." ".$arrProdRecords["LName"] . "</h1></td></tr> ";
    echo "<tr><h2>".$arrProdRecords["Addy"] . "</h2></td></tr> ";
    echo "<tr><h2>".$arrProdRecords["City"].", ".$arrProdRecords["State"]." ".$arrProdRecords["Zip"]. "</h2></td></tr> ";
    echo "<tr><h2>".$arrProdRecords["Phone"] . "</h2></td></tr> ";
    echo "<tr><h2>".$arrProdRecords["Email"] . "</h2></td></tr> ";
}

//create table around the information
$dbProdRecords = mysql_query("SELECT ip.Qty, ThumbNail, Name, Price FROM ip inner join product p on ip.ProductId = p.Id where InvoiceId = '$invId' order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>Quantity</td><td>ThumbNail</td><td>Name</td><td>Price</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td><h2>" . $arrProdRecords["Qty"] . "</h2></td> ";
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

?>
<a href="storethanks.php"><img src="img/checkout.png" width=200></a>
</body>

</html>