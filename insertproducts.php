<html>
<head>
 <title>Lab 03</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

<h2>Insert Into Products<h2>
ID: <input type="text" name="Id" />
Name: <input type="text" name="Name" />
Description: <input type="text" name="Description" />
Quantity: <input type="text" name="Quantity" />
Cost: <input type="text" name="Cost" />

<input type="submit" value="Insert Product"/>
</form>

<?php
require_once("database.php");
$prodId = $_POST['Id'];
$prodName = $_POST['Name'];
$prodDesc = $_POST['Description'];
$prodQty = $_POST['Quantity'];
$prodCost = $_POST['Cost'];

if (isset($_POST['submit']))
{
$dbProdRecords = mysql_query("insert into products values ('$prodId', '$prodName', '$prodDesc', '$prodQty', '$prodCost')", $dbLocalhost)

   or die("Problem writing to table: " . mysql_error());
//echo "I'm in the loop!";
}

$dbProdRecords = mysql_query("SELECT * FROM products order by 1", $dbLocalhost)
    
or die("Problem reading table: " . mysql_error());


//create table around the information

echo "<table cellpadding=5><tr><td>ID</td><td>Name</td><td>Description</td><td>Qty</td><td>Cost</td></tr>";

while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) 
{

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