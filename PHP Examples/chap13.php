<html>

<head>

 <title>T'Chris Chapter 13 Page</title>

 <link href="tchris-chap.css" rel="stylesheet" type = "text/css">


</head>

<body>


<center><h1>Chapter 13</h1></center><br>

<h2>Functions</h2>

<?php
echo "<p>Fahrenheit To Celsius</p>";
function fahrenheitToCelsius( ) {
$floFahrenheit = 212; //move this out of f()
$floCelsius = (5/9)*($floFahrenheit-32);
echo "<p>$floFahrenheit<sup>o</sup>F = $floCelsius<sup>o</sup>C</p>"; //what if this moved?
}
fahrenheitToCelsius(); //this actually calls the function
?>

<h2>Variables and Scope</h2>
<?php
echo "<p>Fahrenheit To Celsius</p>";
function fahrenheitToCelsius1() {
    $fltFahrenheit = 212;
    $fltCelsius = (5/9)*($fltFahrenheit-32);
    echo "<p>$fltFahrenheit<sup>o</sup>F = $fltCelsius<sup>o</sup>C</p>";
}
$fltFahrenheit = 100;
fahrenheitToCelsius1();
echo "<p>$fltFahrenheit<sup>o</sup>F </p>";
?>

<h2>Function with an Argument</h2>
<?php
echo "<p>Fahrenheit To Celsius</p>";
function fahrenheitToCelsius2($floFahrenheit) {
    $floCelsius = (5/9)*($floFahrenheit-32);
    echo "<p>$floFahrenheit<sup>o</sup>F = $floCelsius<sup>o</sup>C</p>";
}
//$temp = 212;
fahrenheitToCelsius2(100); //fTC($temp)
?>

<h2>Multiple Arguements</h2>
<?php
echo "<p>Temperature Converter</p>";
function temperatureConvert($floTemp, $strType) {
    if ($strType == "F") {
        $floCelsius = (5/9)*($floTemp-32);
        echo "<p>$floTemp<sup>o</sup>F = $floCelsius<sup>o</sup>C</p>";
    }
    else {
        $floFahrenheit = (9/5)*$floTemp+32;
        echo "<p>$floTemp<sup>o</sup>C = $floFahrenheit<sup>o</sup>F</p>";
    }
}
temperatureConvert(100, "F");
temperatureConvert(100, "C");
?>

<h2>Using a Loop</h2>
<?php
function temperatureConvert1($floTemp, $strType) {
    if ($strType == "F") {
        $floCelsius = (5/9)*($floTemp-32);
        echo "<p>$floTemp<sup>o</sup>F = $floCelsius<sup>o</sup>C</p>";
    }
    else {
        $floFahrenheit = (9/5)*$floTemp+32;
        echo "<p>$floTemp<sup>o</sup>C = $floFahrenheit<sup>o</sup>F</p>";
    }
}
echo "<h3>Some nice holiday temperatures:</h3>";
for($intCount=25;$intCount<40;$intCount++)
    temperatureConvert1($intCount, "C");
?>

<h2>Default Arguments</h2>
<?php
function temperatureConvert2($floTemp, $strType = "C") {
    if ($strType == "F") {
        $floCelsius = (5/9)*($floTemp-32);
        echo "<p>$floTemp<sup>o</sup>F = $floCelsius<sup>o</sup>C</p>";
    }
    else {
        $floFahrenheit = (9/5)*$floTemp+32;
        echo "<p>$floTemp<sup>o</sup>C = $floFahrenheit<sup>o</sup>F</p>";
    }
}
echo "<h3>Some nice holiday temperatures:</h3>";
for($intCount=25;$intCount<40;$intCount++)
    temperatureConvert2($intCount);
?>

<h2>Returning a Value</h2>
<?php
function temperatureConvert3($floTemp, $strType = "C") {
    if ($strType == "F")
        $floAnswer = (5/9)*($floTemp-32);
    else
        $floAnswer = (9/5)*$floTemp+32;
    return $floAnswer;
}
echo "<h3>Some nice holiday temperatures:</h3>";
for($intCount=25;$intCount<40;$intCount++) {
    $floFahrenheit = temperatureConvert3($intCount);
    echo "<p>$intCount<sup>o</sup>C = $floFahrenheit<sup>o</sup>F</p>";
}
?>

<h2>Or Alternatively</h2>
<?php
function temperatureConvert4($floTemp, $strType = "C") {
    if ($strType == "F")
        $floAnswer = (5/9)*($floTemp-32);
    else
        $floAnswer = (9/5)*$floTemp+32;
    return $floAnswer; 
}
echo "<h3>Some nice holiday temperatures:</h3>";
for($intCount=25;$intCount<40;$intCount++)
    echo "<p>$intCount<sup>o</sup>C = " . temperatureConvert4($intCount) . "<sup>o</sup>F</p>";
?>

<h2>Returning Multiple Values</h2>
<?php
function temperatureConvert5($floTemp, $strType = "C") {
    if ($strType == "F")
        $floAnswer = (5/9)*($floTemp-32);
    else
        $floAnswer = (9/5)*$floTemp+32;
    $arrResult = array();
    $arrResult[] = $floAnswer;
    $arrResult[] = $strType;
    return $arrResult; //an array of course!
}
echo "<h3>Some nice holiday temperatures:</h3>";
$floCelsius = 9.9;
$arrResult = temperatureConvert5($floCelsius);
echo "<p>$floCelsius<sup>o</sup>" . $arrResult[1] . " = " . $arrResult[0] . "<sup>o</sup>F</p>";
?>

<h2>Passing Arguments By Value</h2>
<?php
function reverseIt($strString) {
    $strString = strrev($strString);
  //echo $strString;
}
$strName = "TChris";
echo "<p>$strName ";
reverseIt($strName);
echo "reversed is $strName</p>";
?> 

<h2>Passing By Reference</h2>
<?php
function reverseIt1(&$strString) {
    $strString = strrev($strString);
}
$strName = "TChris";
echo "<p>$strName ";
reverseIt1($strName);
echo "reversed is $strName</p>";
?>

<h2>Functions Within Functions</h2>
<?php
function decimal($intNum) {
    $intNum = round($intNum, 2);
	return $intNum;
}
function multiply($intNumber) {
	$intNumber *= 3.12;
	echo "<p>$intNumber</p>";
	$intNumber = decimal($intNumber);
	echo "<p>$intNumber</p>";
}
$intNumber = 5.2234;
multiply($intNumber);
?>

<h2>Recursive Functions</h2>
<?php
function isPowerOfTwo($intNumber) {
	if ($intNumber == 1)
        echo "<p>yes</p>";
	elseif ($intNumber%2 == 1)
        return "<p>no</p>";
	else {
        $intNumber /= 2;
        return isPowerOfTwo($intNumber);
	}
}
echo isPowerOfTwo(256) ;
?>

<h2>Shared Functions</h2>
<?php
include_once ("sharedfunctions.php");
echo "<h3>Some nice holiday temperatures:</h3>";
for($intCount=25;$intCount<40;$intCount++)
    temperatureConvert10($intCount);
?>

<h2>Getting a Date</h2>
<?php
$arrDate = getdate();
$intSeconds = $arrDate['seconds'];
$intMinutes = $arrDate['minutes'];
$intHours = $arrDate['hours'];
$intMonthDay = $arrDate['mday'];
$intWeekDay = $arrDate['wday'];
$intMonth = $arrDate['mon'];
$intYear = $arrDate['year'];
$intYearDays = $arrDate['yday'];
$strWeekDay = $arrDate['weekday'];
$strMonth = $arrDate['month'];
echo "<p>The time is $intHours:$intMinutes:$intSeconds</p>";
echo "<p>The date is $intMonthDay/$intMonth/$intYear</p>";
echo "<p>The month is $strMonth and the day of the week is $strWeekDay </p>";
echo "<p>It is day $intWeekDay out of 6 this week (with Sunday being 0)</p>";
echo "<p>There have been $intYearDays days so far this year.</p>";
?>

<h2>Microtime</h2>
<?php
$strSecs = microtime();
echo "<p>$strSecs</p>";
?>

<h2>Checking for Valid Dates</h2>
<?php
//was 2/29/2014 a real day?
$booDate = checkdate(2,29,2016);
if($booDate)
	echo "<p>This is a valid date!</p>";
else
	echo "<p>This is an invalid date</p>";
?>

<h2>Random Number Generation</h2>
<?php
srand((double) microtime() * 1000000);
$intRandVal = rand(1,6);
echo "<p>Random Number: $intRandVal</p>";
?>

<h2>Page Redirection</h2>
<a href="login.php">Try Me!</a>
</body>

</html>

