<html>
<head>
 <title>Lab 04</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>
<h2>Insert Product</h2>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

ID: <input type="text" name="Id" />
Name: <input type="text" name="Name" />
Price: <input type="text" name="Price" />
Quantity: <input type="text" name="Qty" />
Picture: <input type="text" name="Picture" /><br>
Thumbnail: <input type="text" name="Thumbnail" />
Description: <textarea name="Desc">Enter text here...</textarea>
Category: <input type="text" name="Category" />
<input type="submit" value="Insert Product"/>
</form>

<?php
require_once("database.php");
$Id = $_POST['Id'];
$Name = $_POST['Name'];
$Desc = $_POST['Desc'];
$Price = $_POST['Price'];
$Qty = $_POST['Qty'];
$Picture = $_POST['Picture'];
$Thumbnail = $_POST['Thumbnail'];
$Category = $_POST['Category'];

if ($_POST['Id'] <> '')
{
$dbProdRecords = mysql_query("insert into product (Id, Name, Descr, Price, Qty, Picture, ThumbNail, Category) values ('$Id', '$Name', '$Desc', '$Price', '$Qty', '$Picture', '$Thumbnail', '$Category')", $dbLocalhost)

   or die("Problem writing to table: " . mysql_error());
//echo "I'm in the loop!";
}

//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM product order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>Thumbnail</td><td>ID</td><td>Name</td><td>Description</td><td>Price</td><td>Quantity</td><td>Category</td><td>Picture</td></tr>";
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