<html>

<head>

 <title>T'Chris Chapter 12 Page</title>

 <link href="tchris-chap.css" rel="stylesheet" type = "text/css">


</head>

<body>


<center><h1>Chapter 12</h1></center><br>

<h2>Open and Close a File</h2>

<?php
$fileTextFile = fopen ("test.txt",'a');
if (!fclose($fileTextFile))
    echo "<p>Error closing file!</p>";
else
	echo "<p>File Closed</p>";
?>

<h2>Reading from a File</h2>
<?php
$fileTextFile = fopen ("test.txt",'r');
$strChar = fgetc($fileTextFile);
echo "<p>$strChar</p>";
if (!fclose($fileTextFile))
    echo "<p>Error closing file!</p>";
?>

<h2>To Read It All...</h2>
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

<h2>Size of a File</h2>
<?php
$fileTextFile = fopen ("test.txt",'r');
$intSize = filesize ("test.txt");
$strFile = fread($fileTextFile, $intSize);
echo $intSize;
echo "<p>$strFile</p>";
if (!fclose($fileTextFile))
    echo "<p>Error closing file!</p>";
?>

<h2>Creating a New File</h2>
<?php
$fileTextFile = fopen ("newtext.txt",'w');
$strDataOne = "Simon\r\n";
$strDataTwo = "Elizabeth";
fwrite($fileTextFile, $strDataOne);
fwrite($fileTextFile, $strDataTwo);
if (!fclose($fileTextFile))
    echo "<p>Error closing file!</p>";
else
	echo "<p>Closed Successfully</p>";
?>

<h2>Cookies!</h2>
<?php 
$strValue = "Hello, this is a cookie";
setcookie ("TestCookie", $strValue);
echo "<p>Cookie Set</p>";
?>

<?php 
$strCookieData = $_COOKIE["TestCookie"];
echo "<p>$strCookieData</p>";
?>

<h2>More Emailing</h2>
<?php
$strEmail =  "tchrisev@gmail.com";
$strSubject = "Sales Figures";
$strMessage = "
<html>
<head>
<style type='text/css'>
body {background-color: white}
tr {color: white;
	background-color: blue}
h1 {color: black}
</style>
</head>
<body>
<div align=\"center\">
<h1>Weekly Sales Figures</h1>
<table width=\"385\">
    <tr>
      <td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td>
    </tr>
    <tr>
      <td>£100,000</td><td>£89,000</td><td>£67,000</td><td>£120,400</td><td>£101,800</td>
    </tr>
  </table>
</div>
</body>
</html>
";
$strHeaders  = "MIME-Version: 1.0\r\n";
$strHeaders .= "Content-type: text/html; charset=iso-8859-1\r\n";
$strHeaders .= "From: yourname@email.com\r\n";
$strHeaders .= "Reply-To: yourname@email.com";
echo "<p>Message sent</p>";
mail($strEmail, $strSubject, $strMessage, $strHeaders);
?>
</body>
</html>






</body>

</html>

