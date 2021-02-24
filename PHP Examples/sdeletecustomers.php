<html>
<head>
 <title>Lab 03</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

<h2>Delete Customer</h2>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

Customer Id: <input type="text" name="prodId" />

<input type="submit" value="Delete Customer"/>
</form>

<?php
require_once("database.php");
$Id = $_POST['Id'];


if ($_POST['Id'] <> '')
{
$dbProdRecords = mysql_query("delete from customer where Id = '$Id'", $dbLocalhost)

   or die("Problem writing to table: " . mysql_error());
}
?>

<?php
//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM customer order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>Id</td><td>Title</td><td>First Name</td><td>Last Name</td><td>Addy</td><td>City</td><td>State</td><td>Zip</td><td>Phone</td><td>Email</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td>" . $arrProdRecords["Id"] . "</td> ";
    echo "<td>" . $arrProdRecords["Title"] . "</td> ";
    echo "<td>" . $arrProdRecords["FName"] . "</td> ";
    echo "<td>" . $arrProdRecords["LName"] . "</td> ";
    echo "<td>" . $arrProdRecords["Addy"] . "</td> ";
    echo "<td>" . $arrProdRecords["City"] . "</td> ";
    echo "<td>" . $arrProdRecords["State"] . "</td> ";
    echo "<td>" . $arrProdRecords["Zip"] . "</td> ";
    echo "<td>" . $arrProdRecords["Phone"] . "</td> ";
    echo "<td>" . $arrProdRecords["Email"] . "</td></tr>";
}
echo "</table>";


?>

<a href="index.php"><img src="img/home.png"></a>
<a href="lab04.php"><img src="img/four.png"></a>
</body>

</html>