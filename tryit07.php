<html>

<head>

 <title>T'Chris TryIt07 Page</title>

 <link href="tchris.css" rel="stylesheet" type = "text/css">


</head>

<body>
<h1>TryIt 7!</h1>

<center>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

</p>
<p>
<label for="strFirstname">Enter String: </label>
<input type='text' name='strString' value='<?php echo $strString ?>' id='strString'/>
<?php if ($booFirstname) echo "Please enter a String!" ?>
</p>


<p><input type="submit" name="submit"/></p>
</form>
</center>

<?php
if (isset($_POST["submit"])) {
    $strString = $_POST["strString"];
    $intLength = strlen($strString);
	$strReversed = strrev($strString);
    $findme   = 'e';
    $pos = strpos($strString, $findme);

if ($pos === false) {
    echo "<h2>The string '$findme' was not found in the string '$strString'</h2>";
} else {
    echo "<h2>The string '$findme' was found in the string '$strString'";
    echo " and exists at position $pos</h2>";
}
    echo "<h3>The string is $intLength characters long</h3>";
	echo "<h4>The string reversed is $strReversed</h4>";
}
?>
<a href="index.php"><img src="img/home.png"></a>
<p id="footer">&copy;Tchris the Grate!</p>


</body>

</html>

