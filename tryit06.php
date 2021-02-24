<html>

<head>

 <title>T'Chris TryIt05 Page</title>

 <link href="tchris.css" rel="stylesheet" type = "text/css">


</head>

<body>
<h1>TryIt 6!</h1>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
<center>
<table>
<tr>
<td valign="top">
<h3>Please select your title and name:</h3>
<p>
<label for="strTitle">Title: </label>
<select name='strTitle' id='strTitle'>
	<option>Select...</option>
	<option <?php if($strTitle == "Mr") echo "Selected" ?>>Mr</option>
	<option <?php if($strTitle == "Miss") echo "Selected" ?>>Miss</option>
	<option <?php if($strTitle == "Ms") echo "Selected" ?>>Ms</option>
	<option <?php if($strTitle == "Mrs") echo "Selected" ?>>Mrs</option>
	<option <?php if($strTitle == "Dr") echo "Selected" ?>>Dr</option></select>
<?php if ($booTitle) echo "Please select a title!" ?>
</p>
<p>
<label for="strFirstname">Firstname: </label>
<input type='text' name='strFirstname' value='<?php echo $strFirstname ?>' id='strFirstname'/>
<?php if ($booFirstname) echo "Please enter a firstname!" ?>
</p>
<p>
<label for="strSurname">Surname: </label>
<input type='text' name='strSurname' value='<?php echo $strSurname ?>' id='strSurname'/>
<?php if ($booSurname) echo "Please enter a surname!" ?>
</p>
</td>
<td valign="top">
<h3>Please select your choices for degrees:</h3>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
<p>
<label for="strIT">IT: </label>
<input type="checkbox" name="strIT" value="IT" id="strIT"/>
<label for="strCS">CS: </label>
<input type="checkbox" name="strCS" value="CS" id="strCS"/>
<label for="strCSS">CSS: </label>
<input type="checkbox" name="strCSS" value="CSS" id="strCSS/>
<label for="strCJ">CJ: </label>
<input type="checkbox" name="strCJ" value="CJ" id="strCJ"/>
<label for="strMATH">MATH: </label>
<input type="checkbox" name="strMATH" value="MATH" id="strMATH"/></p>
</td>
</tr>
</table>


<p><input type="submit" name="submit"/></p>
</center>
</form>

<?php
if (isset($_POST["submit"])) {
    $strTitle = $_POST["strTitle"];
$strFirstname = $_POST["strFirstname"];
$strSurname = $_POST["strSurname"];
$strColorBlue = $_POST["strColorBlue"];
    $strIT = $_POST["strIT"];
    $strCS = $_POST["strCS"];
    $strCSS = $_POST["strCSS"];
    $strCJ = $_POST["strCJ"];
    $strMATH = $_POST["strMATH"];

    echo "<p>Hello $strTitle $strFirstname $strSurname, You are a $strIT  $strCS $strCSS $strCJ  $strMATH Major </p>";
  
}
?>
<a href="index.php"><img src="img/home.png"></a>
<p id="footer">&copy;Tchris the Grate!</p>


</body>

</html>

