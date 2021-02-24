<html>
<head>
 <title>Lab 03</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">
</head>
<body>
<h2>Insert Purchase</h2>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

ID: <input type="text" name="Id" />
Cust ID: <input type="text" name="CustId" />
OrderMonth: <select name="orderMonth">
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="4">April</option>
				<option value="5">May</option>
				<option value="6">June</option>
				<option value="7">July</option>
				<option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
Order Day: 	<select name="orderDay">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select>
Order Year: <input type="text" name="orderYear" />
<input type="submit" value="Insert Purchase"/>
</form>

<?php
require_once("database.php");
$Id = $_POST['Id'];
$CustId = $_POST['CustId'];
$OrderMonth = $_POST['orderMonth'];
$OrderDay = $_POST['orderDay'];
$OrderYear = $_POST['orderYear'];

if ($_POST['Id'] <> '')
{
$dbProdRecords = mysql_query("insert into purchases values ('$Id', '$CustId', '$OrderDay', '$OrderMonth', '$OrderYear')", $dbLocalhost)

   or die("Problem writing to table: " . mysql_error());
//echo "I'm in the loop!";
}

//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM purchases order by 1", $dbLocalhost)
    or die("Problem reading table: " . mysql_error());
//create table around the information
echo "<table cellpadding=5><tr><td>ID</td><td>CustID</td><td>Month</td><td>Day</td><td>Year</td></tr>";
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