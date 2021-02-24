<html>

<head>

 <title>T'Chris Chapter 9 Page</title>

 <link href="tchris-chap.css" rel="stylesheet" type = "text/css">


</head>

<body>


<center><h1>Chapter 9</h1></center><br>

<h2>If</h2>
<?php
$intA = 5;
$intB = 3;
If ($intA > $intB)
Echo "<p>$intA is greater than $intB</p>";
?>
<?php
$strColor = "green";
If ($strColor == "green")
echo "<p>You selected green</p>";
?>
<?php
$strColor = "green";  //try "red"
If ($strColor == "green")
{
echo "<p>You selected green</p>";
echo "<p>green is a nice color</p>";
echo "<p>It is the color of grass</p>";
}
?>

<h2>Else</h2>
<?php
$strColor = "green";  //try "red"
if ($strColor == "green")
{
echo "<p>You selected green</p>";
echo "<p>green is a nice color</p>";
echo "<p>It is the color of grass</p>";
}
else
{
echo "<p>You selected something else</p>";
}
?>

<h2>ElseIf</h2>
<?php
$intNum1 = 100;
$intNum2 = 80;
if ($intNum1 > $intNum2){
echo "<p>First number is greater</p>"; }
elseif ($intNum1 == $intNum2) {
echo "<p>They are the same</p>";}
else {
echo "<p>Second number is greater</p>";}
?>

<h2>Switches</h2>
<?php
$strName = "Sam";
switch ($strName){
case "Dean": echo "<p>Hi Dean</p>";
case "Sam": echo "<p>Hi Sam</p>";
case "Bobby": echo "<p>Hi Bobby</p>";
case "Cas": echo "<p>Hi Cas</p>";
}
?>

<h2>While Loops</h2>
<?php
$intCount = 1; //what if it = 11?
while ($intCount <= 10) {
echo "<p>Iteration $intCount</p>";
$intCount++;  //or leave this off
}
?>

<h2>Do-While Loops</h2>
<?php
$intCount = 1; //what if it = 11?
do {
echo "<p>Iteration $intCount</p>";
$intCount++;  //or leave this off
}
while ($intCount <= 1) //or 10
?>


<h2>For Loops</h2>
<?php
for($intCount = 1; $intCount <= 10; $intCount++)
    echo "<p>Iteration $intCount</p>";
?>

<h2>Nesting Loops</h2>
<?php
$booBlackWhite = 0;
echo "<table border='1'>";
for($intRows = 1; $intRows <= 8; $intRows++) {
    $intColumns = 1;
    echo "<tr>";
    while ($intColumns <= 8) {
        if ($booBlackWhite)
            echo "<td><img src='img/white.gif' width='30' height='30' alt='blackSquare' align='top'/></td>";
        else
            echo "<td><img src='img/black.gif' width='30' height='30' alt='whiteSquare' align='top'/></td>";
        $intColumns++;
        if ($booBlackWhite == 1)
            $booBlackWhite = 0;
        else
            $booBlackWhite = 1;
    }
    echo "</tr>";
    if ($booBlackWhite == 1)
        $booBlackWhite = 0;
    else
        $booBlackWhite = 1;
}
echo "</table>";
?>

<h2>Escaping Loops</h2>
<?php
$intCount = 1;
while (1) {
	echo "<p>Iteration $intCount</p>";
	$intCount++;
	if ($intCount > 6)
        		break;
}
?>

<h2>Other Truth Conditions</h2>
<?php
for($intCount=1; $intCount<10; $intCount++){
	if ($intCount % 2)
        continue;
    echo "<p>$intCount is even.</p>";
}
?>




</body>

</html>

