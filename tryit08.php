<html>

<head>

 <title>T'Chris TryIt07 Page</title>

 <link href="tchris.css" rel="stylesheet" type = "text/css">


</head>

<body>
<h1>TryIt 8!</h1>

<?php
$fileTextFile = fopen ("test.txt",'r');
echo "<p>";
while (!feof($fileTextFile)) {
    $strChar = fgetc($fileTextFile);
    echo "$strChar";
}
echo "</p>";
if (!fclose($fileTextFile))
    echo "<p>Error closing file!</p>";
?>
<h2>Cookies!</h2>
<?php 
$strValue = "Halloween is my favorite Holiday";
setcookie ("FavHoliday", $strValue);
echo "<p>Cookie Set</p>";
?>

<a href="index.php"><img src="img/home.png"></a>
<p id="footer">&copy;Tchris the Grate!</p>


</body>

</html>

