<html>
<head>
 <title>Lab 04</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>
<h2>Delete Product</h2>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

Product Id: <input type="text" name="prodId" />

<input type="submit" value="Delete Product"/>
</form>

<?php
require_once("database.php");
$prodId = $_POST['prodId'];


if ($_POST['Id'] <> '')
{
$dbProdRecords = mysql_query("delete from product where Id = '$prodId'", $dbLocalhost)

   or die("Problem writing to table: " . mysql_error());
}
?>

<?php
require_once("database.php");
//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM product order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>Thumbnail</td><td>ID</td><td>Name</td><td>Description</td><td>Price</td><td>Quantity</td><td>Picture</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td><img src='img/" . $arrProdRecords["ThumbNail"] . "' width=100></td> ";
    echo "<td>" . $arrProdRecords["Id"] . "</td> ";
    echo "<td>" . $arrProdRecords["Name"] . "</td> ";
    echo "<td>" . $arrProdRecords["Descr"] . "</td> ";
    echo "<td>" . $arrProdRecords["Price"] . "</td> ";
    echo "<td>" . $arrProdRecords["Qty"] . "</td> ";
    echo "<td>" . $arrProdRecords["Category"] . "</td> ";
    echo "<td><img src='img/" . $arrProdRecords["Picture"] . "'></td></tr>";
}
echo "</table>";


?>
<a href="index.php"><img src="img/home.png"></a>
<a href="lab04.php"><img src="img/four.png"></a>
</body>

</html>