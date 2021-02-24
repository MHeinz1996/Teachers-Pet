<html>
<head>
 <title>Lab 04</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>
<h2>Insert IP (Invoice Products)</h2>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
ProductId: <input type="text" name="prodId" />
InvoiceId: <input type="text" name="invId" />
Quantity: <input type="text" name="quantity" />
<input type="submit" value="Insert Purchase"/>
</form>

<?php
require_once("database.php");
$prodId = $_POST['prodId'];
$invId = $_POST['invId'];
$quantity = $_POST['quantity'];

if ($_POST['Id'] <> '')
{
$dbProdRecords = mysql_query("insert into ip values ('$prodId', '$invId', '$quantity')", $dbLocalhost)

   or die("Problem writing to table: " . mysql_error());
//echo "I'm in the loop!";
}

//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM ip order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>Prod ID</td><td>Invoice ID</td><td>Quantity</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td>" . $arrProdRecords["ProductId"] . "</td> ";
    echo "<td>" . $arrProdRecords["InvoiceId"] . "</td> ";
    echo "<td>" . $arrProdRecords["Qty"] . "</td></tr>";
}
echo "</table>";


?>
<a href="index.php"><img src="img/home.png"></a>
<a href="lab04.php"><img src="img/four.png"></a>
</body>

</html>