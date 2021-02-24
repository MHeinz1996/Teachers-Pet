<html>

<head>
 <title>Lab 04</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>

<h2>Update Product</h2>
<form action="supdateproducts.php" method="POST">
Record to Edit: <input type="text" name="submit1" />
<input type="submit" value="Update This!"/>
</form>



<?php 
if ($_POST[submit1] <> '')

{
require_once("database.php");
$item = $_POST[submit1];

$dbProdRecords = mysql_query("SELECT * FROM product where Id = '$item'", $dbLocalhost)

    or die("Problem reading table: " . mysql_error());

		while ($arrProdRecords = mysql_fetch_array($dbProdRecords))
 {
			$id          = $arrProdRecords["Id"];  
			$name        = $arrProdRecords["Name"];
			$desc        = $arrProdRecords["Descr"];
			$price       = $arrProdRecords["Price"];
			$qty         = $arrProdRecords["Qty"]; 
			$category    = $arrProdRecords["Category"];
			$pict        = $arrProdRecords["Picture"];
			$thumb       = $arrProdRecords["ThumbNail"];

echo "<form action='supdateproducts.php' method='POST'>";
echo "ID: <input type='text' name='Id' value='$id'/>";
echo "Name: <input type='text' name='Name' value='$name'/>";
echo "Price: <input type='text' name='Price' value='$price'/>";
echo "Quantity: <input type='text' name='Qty' value='$qty'/>";
echo "Category: <input type='text' name='Category' value='$category'/>";
echo "Picture: <input type='text' name='Picture' value='$pict'/><br>";

echo "Thumbnail: <input type='text' name='Thumbnail' value='$thumb'/>";

echo "Description: <textarea name='Desc'>$desc</textarea>";
echo "<input type='submit' value='Update Product'/></form>";


}
}
?>

<?php

require_once("database.php");

$Id = $_POST['Id'];

$Name = $_POST['Name'];

$Desc = $_POST['Desc'];

$Price = $_POST['Price'];

$Qty = $_POST['Qty'];

$Category = $_POST['Category'];

$Picture = $_POST['Picture'];

$Thumbnail = $_POST['Thumbnail'];



if ($_POST['Id'] <> '')

{

$dbProdRecords = mysql_query("update product set Name= '$Name', Descr='$Desc', Price='$Price', Qty='$Qty', Picture='$Picture', ThumbNail='$Thumbnail', Category='$Category' where Id='$Id'", $dbLocalhost)


   or die("Problem writing to table: " . mysql_error());


}


//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM product order by 1", $dbLocalhost)

    or die("Problem reading table: " . mysql_error());

//create table around the information

echo "<table cellpadding=5><tr><td>Thumbnail</td><td>ID</td><td>Name</td><td>Description</td><td>Price</td><td>Quantity</td><td>Category</td><td>Picture</td></tr>";

while ($arrProdRecords = mysql_fetch_array($dbProdRecords))
 {

    echo "<tr><td><img src='img/" . $arrProdRecords["ThumbNail"] . "' width=100></td> ";

    echo "<td>" . $arrProdRecords["Id"] . "</td> ";

    echo "<td>" . $arrProdRecords["Name"] . "</td> ";

    echo "<td>" . $arrProdRecords["Descr"] . "</td> ";

    echo "<td>" . $arrProdRecords["Price"] . "</td> ";

    echo "<td>" . $arrProdRecords["Qty"] . "</td> ";

    echo "<td>" . $arrProdRecords["Category"] . "</td> ";

    echo "<td><img src='img/" . $arrProdRecords["Picture"] . "' width=400></td></tr>";

}

echo "</table>";



?>

<a href="index.php"><img src="img/home.png"></a>
<a href="lab04.php"><img src="img/four.png"></a>
</body>


</html>