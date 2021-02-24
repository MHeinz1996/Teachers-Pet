<html>

<head>

 <title>T'Chris Chapter 15 Page</title>

 <link href="tchris-chap.css" rel="stylesheet" type = "text/css">


</head>

<body>


<center><h1>Chapter 15</h1></center><br>

<h2>Sample Databases</h2>
<p>These are presetup for your convenience and pleasure.  If you are using your own machine instead of my server, you will need to create these tables.</p>
<p>You can view the data in the various tables by selecting <a href="viewproducts.php">View Products</a>, <a href="viewcustomers.php">View Customers</a>, <a href="viewpurchases.php">View Purchases</a>, or <a href="viewpurchaseproducts.php">View PurchaseProducts</a> (the Invoice Join Table). 
<h2>The Database.php file</h2>
<p>Put the following in the database.php file.  Name it based on the algorythm you were shown in the slides</p>
<p>$dbLocalhost = mysql_connect("localhost", "fotinfo_tchris", "EM420CTU")<br>
	   or die("Could not connect: " . mysql_error());<br>
	mysql_select_db("fotinfo_tchris", $dbLocalhost)</br>
	or die("Could not find database: " . mysql_error());</p>

<h2>Viewing Records</h2>
<?php

require_once("database.php");
$dbRecords = mysql_query("SELECT * FROM customers", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
$strSurname = mysql_result($dbRecords, 0, "Surname");
echo "<p>$strSurname</p>";
?>
<h2>Viewing All Records</h2>
<?php
require_once("database.php");
$dbRecords = mysql_query("SELECT * FROM products", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
while ($arrRecord = mysql_fetch_row($dbRecords)) {
    echo "<p>" . $arrRecord[0] . " ";
    echo $arrRecord[1] . " ";
    echo $arrRecord[2] . " ";
    echo $arrRecord[3] . "</p>";
}

?>
<h2>Product Names</h2>
<?php
require_once("database.php");
$dbRecords = mysql_query("SELECT Name FROM products", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
while ($arrRecord = mysql_fetch_row($dbRecords)) {
    echo "<p>" . $arrRecord[0] . " ";
    echo $arrRecord[1] . " ";//we could name
    echo $arrRecord[2] . " ";
    echo $arrRecord[3] . "</p>";
}
?>
<h2>Filtering the SQL</h2>
<?php
require_once("database.php");
$dbRecords = mysql_query("SELECT * FROM customers WHERE Title = 'Mrs'", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
echo "<p>Customers:</p>";
while ($arrRecords = mysql_fetch_array($dbRecords)) {
    echo "<p>" . $arrRecords["Id"] . " ";
    echo $arrRecords["Title"] . " ";
    echo $arrRecords["Surname"] . " ";
    echo $arrRecords["Firstname"] . "</p>";
}
$dbRecords = mysql_query("SELECT * FROM products WHERE Name = 'Wine Glass'", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
echo "<p>Products:</p>";
while ($arrRecords = mysql_fetch_array($dbRecords)) {
    echo "<p>" . $arrRecords["Id"] . " ";
    echo $arrRecords["Name"] . " ";
    echo $arrRecords["Description"] . " ";
    echo $arrRecords["Quantity"] . " ";
    echo $arrRecords["Cost"] . "</p>";
}
?>

<h2>Inserting</h2>

<?php
require_once("database.php");
$dbProdRecords = mysql_query("INSERT INTO products VALUES ('', 'Beer Mug', '600 ml Beer Mug', '100', '5.99')", $dbLocalhost)
   or die("Problem writing to table: " . mysql_error());
$dbProdRecords = mysql_query("SELECT * FROM products", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<p>" . $arrProdRecords["Id"] . " ";
    echo $arrProdRecords["Name"] . " ";
    echo $arrProdRecords["Decription"] . " ";
    echo $arrProdRecords["Quantity"] . " ";
    echo $arrProdRecords["Cost"] . "</p>";
}

?>
<h2>Variables</h2>
<a href="insertproducts.php">Example with Form</a>
<?php
$strItemName = "Beer Stein";
$strSizeDesc = "2 litre Stein";
$intQuantity = 50;
$fltPrice = 15.99;

$sql="INSERT INTO products (Name, decription, quantity, cost) \nVALUES \n('$strItemName','$strSizeDesc','$intQuantity','$fltPrice')";
require_once("database.php");

$dbProdRecords1 = mysql_query($sql, $dbLocalhost)
   or die("Problem writing to table: " . mysql_error());
$dbProdRecords = mysql_query("SELECT * FROM products", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<p>" . $arrProdRecords["Id"] . " ";
    echo $arrProdRecords["Name"] . " ";
    echo $arrProdRecords["Decription"] . " ";
    echo $arrProdRecords["Quantity"] . " ";
    echo $arrProdRecords["Cost"] . "</p>";
}
?>
<h2>Deleting</h2>
<a href="deletecustomers.php">Example with Form</a>
<?php
require_once("database.php");
$dbCustRecords = mysql_query("DELETE FROM customers WHERE Id='3'", $dbLocalhost)
   or die("Problem writing to table: " . mysql_error());
$dbCustRecords = mysql_query("SELECT * FROM customers", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
while ($arrCustRecords = mysql_fetch_array($dbCustRecords)) {
    echo "<p>" . $arrCustRecords["Id"] . " ";
    echo $arrCustRecords["Title"] . " ";
    echo $arrCustRecords["Surname"] . " ";
    echo $arrCustRecords["Firstname"] . "</p>";
}
?> 

<h2>Amending</h2>
<a href="updateproducts.php">Example with Form</a>
<?php
require_once("database.php");
$dbCustRecords = mysql_query("UPDATE products SET Decription='250 ml Tall Glass' WHERE Id='6'", $dbLocalhost)
   or die("Problem updating table: " . mysql_error());
$dbProdRecords = mysql_query("SELECT * FROM products", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<p>" . $arrProdRecords["Id"] . " ";
    echo $arrProdRecords["Name"] . " ";
    echo $arrProdRecords["Decription"] . " ";
    echo $arrProdRecords["Quantity"] . " ";
    echo $arrProdRecords["Cost"] . "</p>";
}
?>










</body>

</html>

