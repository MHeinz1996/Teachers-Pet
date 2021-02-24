<html>

<head>

 <title>T'Chris Chapter 8 Page</title>

 <link href="tchris-chap.css" rel="stylesheet" type = "text/css">


</head>

<body>


<center><h1>Chapter 8</h1></center><br>

<h2>PHP!</h2>

<?php
echo '<p>Hello, World</p>';
?>

<?php
echo '<p>This is PHP script generated.</p>';
?>
<p>This is not.</p>
<?php
echo '<p>This is also PHP script generated.</p>';
?>

<h2>Strings</h2>
<?php
$strName = 'Dean Winchester';
echo '<p>';
echo $strName;
echo '</p>';
?>

<h2>Constants</h2>
<?php
define ("AUTHOR", "Carver Edlund");
echo '<p>';
echo AUTHOR;
echo '</p>';
?>

<h2>Expressions</h2>
<?php
$intA = 5;
$intB = 4;
$intC = $intA + $intB;
echo "<p>$intA + $intB = $intC</p>";
$intC = $intA - $intB;
echo "<p>$intA - $intB = $intC</p>";
$intC = $intB - $intA;
echo "<p>$intB - $intA = $intC</p>";
$intC = $intA * $intB;
echo "<p>$intA * $intB = $intC</p>";
$intC = $intA / $intB;
echo "<p>$intA / $intB = $intC</p>";
$intC = -$intA;
echo "<p>$intA minus = $intC</p>";
$intC = $intA % $intB;
echo "<p>$intA % $intB = $intC</p>";
?>

<h2>Bitwise Operators</h2>
<?php
$intA = 7;
$intB = 2;
$intC = $intA & $intB;  //AND
echo "<p>$intA & $intB = $intC</p>";
$intC = $intA | $intB;  //OR
echo "<p>$intA | $intB = $intC</p>";
$intC = $intA ^ $intB;  //XOR
echo "<p>$intA ^ $intB = $intC</p>";
$intC = ~$intA;  //NOT
echo "<p>~$intA = $intC</p>";
$intC = $intA << $intB;  //SHIFT LEFT
echo "<p>$intA << $intB = $intC</p>";
$intC = $intA >> $intB;  //SHIFT RIGHT
echo "<p>$intA >> $intB = $intC</p>";
?>

<h2>String Operators</h2>
<?php
$strFirstname = "Dean";
$strSurname = "Winchester";
$strFullname = $strFirstname . $strSurname;
echo "<p>$strFirstname joined with $strSurname is $strFullname</p>";
$strFullname = $strFirstname . " " . $strSurname;
echo "<p>$strFirstname joined with $strSurname with a space is $strFullname</p>";
$strFullname = $strFirstname;
$strFullname .= " ";
$strFullname .= $strSurname;
echo "<p>$strFirstname joined with $strSurname with a space is $strFullname</p>";
?>

<h2>Integers in Strings</h2>
<?php
$intAge = 56;
$strName = "Bobby's age is ";
$strText = $strName . " " . $intAge;
echo $strText;
?>

<h2>String Operators</h2>
<?php
$intA = 3;
echo '<p>$intA begins as ' . $intA . "</p>";
echo '<p>$intA++ ' . $intA++ . "</p>";
echo '<p>$intA is now really ' . $intA . "</p>";
echo '<p>++$intA ' . ++$intA . "</p>";
echo '<p>$intA-- ' . $intA-- . "</p>";
echo '<p>$intA is now really ' . $intA . "</p>";
echo '<p>--$intA ' . --$intA . "</p>";
?>

<h2>Error Control Operators</h2>
<?php
$intA = 7;
$intB = 0;
@$intC = $intA / $intB;
echo "<p>$intA / $intB = $intC</p>";
?>

<h2>Predefined Variables</h2>
<?php
echo "<p>" . $_SERVER['DOCUMENT_ROOT'] . "</p>";
?>


</body>

</html>

