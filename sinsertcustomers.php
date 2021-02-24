<html>
<head>
 <title>Lab 04</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

<h2>Insert Customer</h2>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

Customer Id: <input type="text" name="Id" />
Title: <input type="text" name="title" />
First Name: <input type="text" name="FName" />
Last Name: <input type="text" name="LName" /><br>
Addy: <input type="text" name="Addy" /><br>
City: <input type="text" name="City" />
State: <input type="text" name="cState" />
Zip: <input type="text" name="cZip" /><br>
Phone: <input type="text" name="phone" />
Email: <input type="text" name="eMail" />

<input type="submit" value="Insert Customer"/>
</form>

<?php
require_once("database.php");
$Id = $_POST['Id'];
$title = $_POST['title'];
$FName = $_POST['FName'];
$LName = $_POST['LName'];
$Addy = $_POST['Addy'];
$City = $_POST['City'];
$cState = $_POST['cState'];
$cZip = $_POST['cZip'];
$phone = $_POST['phone'];
$eMail = $_POST['eMail'];


if ($_POST['Id'] <> '')
{
$dbProdRecords = mysql_query("insert into customer (Id, Title, FName, LName, Addy, City, State, Zip, Phone, Email) VALUES ('$Id', '$title', '$FName', '$LName', '$Addy', '$City', '$cState', '$cZip', '$phone', '$eMail')", $dbLocalhost)

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