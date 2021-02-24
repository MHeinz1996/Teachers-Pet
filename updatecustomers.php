<html>
<head>
 <title>Lab 03</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

<h2>Update Customers<h2>
ID: <input type="text" name="Id" />
Title: <input type="text" name="Title" />
FirstName: <input type="text" name="fName" />
LastName: <input type="text" name="lName" />

<input type="submit" value="Update Customer"/>
</form>

<?php
require_once("database.php");
$custId = $_POST['Id'];
$custTitle = $_POST['Title'];
$custFName = $_POST['fName'];
$custLName = $_POST['lName'];

if ($_POST['Id'] <> '')
{
$dbProdRecords = mysql_query("update customers set Title = '$custTitle', Firstname = '$custFName', Surname = '$custLName' where Id = '$custId'", $dbLocalhost)

   or die("Problem writing to table: " . mysql_error());
//echo "I'm in the loop!";
}

//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM customers order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>ID</td><td>Title</td><td>First Name</td><td>Last Name</td></tr>";
while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) {
    echo "<tr><td>" . $arrProdRecords["Id"] . "</td> ";
    echo "<td>" . $arrProdRecords["Title"] . "</td> ";
    echo "<td>" . $arrProdRecords["Firstname"] . "</td> ";
    echo "<td>" . $arrProdRecords["Surname"] . "</td></tr>";
}
echo "</table>";


?>
<a href="index.php"><img src="img/home.png"></a>
<a href="lab03.php"><img src="img/three.jpg"></a>
</body>

</html>