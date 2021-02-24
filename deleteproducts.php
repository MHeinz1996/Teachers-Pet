<html>
<head>
 <title>Lab 03</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

Record ID to DELETE: <input type="text" name="Id" />

<input type="submit" value="Delete Record"/>
</form>

<?php
require_once("database.php");
$deleteId = $_POST['Id'];

if ($_POST['Id'] <> '')
{
$dbProdRecords = mysql_query("delete from products where Id = '$deleteId'", $dbLocalhost)

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