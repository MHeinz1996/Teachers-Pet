<html>
<head>
 <title>Lab 03</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

<h2>Update Purchases<h2>
ID: <input type="text" name="Id" />
Customer ID: <input type="text" name="custId" />
Month: <input type="text" name="orderMonth" />
Date: <input type="text" name="orderDate" />
Year: <input type="text" name="orderYear" />

<input type="submit" value="Update Purchases" name="submit"/>
</form>

<?php
require_once("database.php");
$oId = $_POST['Id'];
$custId = $_POST['custId'];
$oMonth = $_POST['orderMonth'];
$oDate = $_POST['orderDate'];
$oYear = $_POST['orderYear'];

if (isset($_POST['submit']))
{
$dbProdRecords = mysql_query("update purchases set customers_Id = '$custId', Month = '$oMonth', Day = '$oDate', Year = '$oYear' where Id = '$oId'", $dbLocalhost)

   or die("Problem writing to table: " . mysql_error());
//echo "I'm in the loop!";
}

//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM purchases order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>ID</td><td>Cust Id</td><td>Month</td><td>Day</td><td>Year</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td>" . $arrProdRecords["Id"] . "</td> ";
    echo "<td>" . $arrProdRecords["customers_Id"] . "</td> ";
    echo "<td>" . $arrProdRecords["Month"] . "</td> ";    
    echo "<td>" . $arrProdRecords["Day"] . "</td> ";
    echo "<td>" . $arrProdRecords["Year"] . "</td></tr>";
}
echo "</table>";


?>
<a href="index.php"><img src="img/home.png"></a>
<a href="lab03.php"><img src="img/three.jpg"></a>
</body>

</html>