<html>

<head>

 <title>T'Chris TryIt10 Page</title>

 <link href="tchris.css" rel="stylesheet" type = "text/css">


</head>

<body>
<h1>TryIt 10!</h1>

<h3>Please select a product-type to view:</h3>
<center>
<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
<select name='productChoice'>
  <option value="--">--</option>
  <option value="beer glass">Beer Glass</option>
  <option value="beer mug">Beer Mug</option>
  <option value="small glass">Small Glass</option>
  <option value="tall glass">Tall Glass</option>
  <option value="wine glass">Wine Glass</option>
</select>
<p><input type="submit" value="submit"/>
</form>
</center>

<?php
require_once("database.php");
$choice = $_POST['productChoice'];
if ($_POST['productChoice'] <> '--')
{
$dbProdRecords = mysql_query("SELECT * FROM products where Decription like '%$choice%'", $dbLocalhost)
    
or die("Problem reading table: " . mysql_error());


//create table around the information

echo "<center><table cellpadding=5><tr><td>ID</td><td>Name</td><td>Description</td><td>Qty</td><td>Cost</td></tr>";

while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) 
{

    echo "<tr><td>" . $arrProdRecords["Id"] . "</td> ";

    echo "<td>" . $arrProdRecords["Name"] . "</td> ";

    echo "<td>" . $arrProdRecords["Decription"] . "</td> ";

    echo "<td>" . $arrProdRecords["Quantity"] . "</td> ";

    echo "<td>" . $arrProdRecords["Cost"] . "</td></tr>";

}

echo "</table></center>";
}
?>

<a href="index.php"><img src="img/home.png"></a>
<p id="footer">&copy;Tchris the Grate!</p>


</body>

</html>

