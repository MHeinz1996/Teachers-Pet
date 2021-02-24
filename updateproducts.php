<html>
<head>
 <title>Lab 03</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

<h2>Update Products<h2>
ID: <input type="text" name="Id" />
Name: <input type="text" name="pname" />
Quantity: <input type="text" name="pqty" />
Cost: <input type="text" name="pcost" /><br>
Description: <input type="text" name="pdesc" cols="40" rows="5" style="width:200px; height:50px;"  />

<input type="submit" value="Update Products" name="submit"/>
</form>

<?php
require_once("database.php");
$prodId = $_POST['Id'];
$prodName = $_POST['pname'];
$prodqty = $_POST['pqty'];
$prodcost = $_POST['pcost'];
$proddesc = $_POST['pdesc'];

if (isset($_POST['submit']))
{
$dbProdRecords = mysql_query("update products set Name = '$prodName', Quantity = '$prodqty', Cost = '$prodcost', Decription = '$proddesc' where Id = '$prodId'", $dbLocalhost)

   or die("Problem writing to table: " . mysql_error());
//echo "I'm in the loop!";
}

//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM products order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>ID</td><td>Name</td><td>Description</td><td>Quantity</td><td>Cost</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td>" . $arrProdRecords["Id"] . "</td> ";
    echo "<td>" . $arrProdRecords["Name"] . "</td> ";
    echo "<td>" . $arrProdRecords["Decription"] . "</td> ";    
    echo "<td>" . $arrProdRecords["Quantity"] . "</td> ";
    echo "<td>" . $arrProdRecords["Cost"] . "</td></tr>";
}
echo "</table>";


?>
<a href="index.php"><img src="img/home.png"></a>
<a href="lab03.php"><img src="img/three.jpg"></a>
</body>

</html>