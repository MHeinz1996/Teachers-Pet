<html>

<head>

 <title>T'Chris Chapter 11 Page</title>

 <link href="tchris-chap.css" rel="stylesheet" type = "text/css">


</head>

<body>


<center><h1>Chapter 11</h1></center><br>

<h2>Basic Formatting</h2>
<?php
$strName = "Dean Winchester";
echo "<table border='1' width='300'>";
echo "<tr align='center'>";
for ($intLetter=0;$intLetter<15;$intLetter++)
    echo "<td>$intLetter</td>";
echo "</tr>";
echo "<tr>";
for ($intLetter=0;$intLetter<15;$intLetter++)
    echo "<td align='center'>" . $strName{$intLetter} . "</td>";
echo "</tr>";
echo "</table>";
?>

<h2>String Length and Substrings</h2>
<?php
	$strName = "Sam Winchester";
$intStringLength = strlen($strName);
echo "<p>The string is $intStringLength characters long</p>";
?>
<?php
$strName = "Chris Winchester";
$strOutput = strstr($strName, "ch");
echo "<p>The result is $strOutput</p>";
?> 

<h2>Find a Character Position</h2>
<?php
$mystring = 'abc';
$findme   = 'a';
$pos = strpos($mystring, $findme);

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
if ($pos === false) {
    echo "<p>The string '$findme' was not found in the string '$mystring'</p>";
} else {
    echo "<p>The string '$findme' was found in the string '$mystring'";
    echo " and exists at position $pos</p>";
}
?>

<h2>String Manipulation</h2>
<?php
$strSentence = "The use of italics can be useful to highlight certain words";
$strOutput = str_replace( "italics", "<i>italics</i>", $strSentence);
echo "<p>The string now looks like: '$strOutput'</p>";
?>
<?php
$strName = "Bobby Singer";
$strReversed = strrev($strName);
echo "<p>$strName backwards is $strReversed</p>";
?>

<h2>Case Sensitivity</h2>
<?php
$strUpper = strtoupper("dean winchester");
$strLower = strtolower("CASTIEL");
$strUpperFirst = ucfirst("sam winchester");
$strUpperFirstWords = ucwords("bobby singer");
echo "<p>dean winchester strtoupper = $strUpper</p>";
echo "<p>CASTIEL strtolower = $strLower</p>";
echo "<p>sam winchester ucfirst = $strUpperFirst</p>";
echo "<p>bobby singer ucwords = $strUpperFirstWords</p>";
?>

<h2>Encryption</h2>
<?php
$strPassword = "secretsquirrel";
$strEncryptedPassword = md5($strPassword);
echo "<p>$strPassword encrypted is $strEncryptedPassword</p>";
?>

<h2>Outputting an Array</h2>
<?php
$arrColors = array ("Red", "Green", "Blue", "Yellow", "White");
for($intCount=0;$intCount<5;$intCount++)
    echo "<p>" . $arrColors[$intCount] . "</p>";
?>
<?php
$arrColors = array (0=>"Red", 2=>"Green", 3=>"Blue", 5=>"", 1=>"Yellow", 4=>"White");
for($intCount=0;$intCount<6;$intCount++)
    echo "<p>$intCount " . $arrColors[$intCount] . "</p>";
?>

<h2>More Array Goodness-For Each</h2>
<?php
$arrColors = array (0=>"Red", 2=>"Green", 3=>"Blue", 5=>"", 1=>"Yellow", 4=>"White");
$intCount = 0;
foreach($arrColors as $strColor)
    echo "<p>" . $intCount++ . " $strColor</p>";
?>

<h2>Even More</h2>
<?php
$arrColors = array (0=>"Red", 2=>"Green", 3=>"Blue", 5=>"", 1=>"Yellow", 4=>"White");
foreach($arrColors as $intKey=>$strColor)
    echo "<p>$intKey $strColor</p>";
?>

<h2>Even More</h2>
<?php
$arrColors = array ("red"=>"Red", "green"=>"Green", "blue"=>"Blue", "yellow"=>"Yellow", "white"=>"White");
foreach($arrColors as $strKey=>$strColor)
    echo "<p>$strKey $strColor</p>";
?>

<h2>A Security Solution</h2>
<?php
$arrUsernamePassword = array ("dean"=>"impala1967", "sammy"=>"stanford123", "adam"=>"belmont32", "bobby"=>"durham412");
$strEnteredUsername = "sammy"; 
$strEnteredPassword = "stanford123";
$strStoredPassword = $arrUsernamePassword[$strEnteredUsername];
if (!$strStoredPassword)
    echo "<p>Invalid Username!</p>";
elseif ($strStoredPassword == $strEnteredPassword)
    echo "<p>Username and Password match!</p>";
else
    echo "<p>Invalid Password!</p>";
?>

<h2>An Array of Arrays</h2>
<?php
$arrCars = array (  array("Ford", "Mazda", "Renault", "Vauxhall", "Toyota"),
                    array("Blue", "Black", "Red", "Green", "Red"),
                    array(4,4,2,3,2)
);
for ($intCount=0;$intCount<5;$intCount++) {
    $strMake = $arrCars[0][$intCount];
    $strColour = $arrCars[1][$intCount];
    $intQuantity = $arrCars[2][$intCount];
    echo "<p>Make: $strMake Colour: $strColour Quantity: $intQuantity</p>";
}
?>

<h2>Better Selections</h2>
<?php
$arrCars = array (	"Make" => array("Ford", "Mazda", "Renault", "Vauxhall", "Toyota"),
		"Color" => array("Blue", "Black", "Red", "Green", "Red"),
		"Quantity" => array(4,4,2,3,2)
);
foreach($arrCars["Make"] as $strKey=>$strMake){
    $strColor = $arrCars["Color"][$strKey];
    $intQuantity = $arrCars["Quantity"][$strKey];
    echo "<p>Make: $strMake Color: $strColor Quantity: $intQuantity</p>";
}
?>

<h2>Hidden Arrays</h2>
<?php
if (isset($_POST["submit"])) {
	echo("<p>The array contains:</p>");
	$arrNames = $_POST['arrNames'];
	for($intCount=0;$intCount<4;$intCount++)
		echo"<p>" . $arrNames[$intCount] . "</p>";
}
else
	$arrNames = array("Crowley","Meg","Gemma","Lilith");
?>
<h2>A Hidden Array Example</h2>
<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
<p><input type='hidden' name='arrNames' value='<?php echo $arrNames ?>'/>
<input type='submit' name='submit'/></p>
</form>

<h2>Another Array</h2>
<?php
$arrColors = array (0=>"Red", 2=>"Green", 3=>"Blue", 1=>"Yellow", 4=>"White");
$intSize = count($arrColors);
for($intCount=0;$intCount<$intSize;$intCount++)
    echo "<p>$intCount " . $arrColors[$intCount] . "</p>";
?>

<h2>Array Validation</h2>
<?php
$arrColors = array (0=>"Red", 2=>"Green", 3=>"Blue", 1=>"Yellow", 4=>"White");
$intSize = count($arrColors);
echo "<p>";
for($intCount=0;$intCount<$intSize;$intCount++)
    echo $arrColors[$intCount] . " ";
echo "</p>";
$arrColors[3] = "Purple";
echo "<p>";
for($intCount=0;$intCount<$intSize;$intCount++)
    echo $arrColors[$intCount] . " ";
echo "</p>";
?>

<h2>What in the World?</h2>
<?php
$arrColors = array (0=>"Red", 2=>"Green", 3=>"Blue", 1=>"Yellow", 4=>"White");
$intSize = count($arrColors);
echo "<p>";
for($intCount=0;$intCount<$intSize;$intCount++)
    echo $arrColors[$intCount] . " ";
echo "</p>";
$arrColors[] = "Purple";
$arrColors[] = "Brown";
$arrColors[] = "Grey";
$intSize = count($arrColors);
echo "<p>";
for($intCount=0;$intCount<$intSize;$intCount++)
    echo $arrColors[$intCount] . " ";
echo "</p>";
?>

<h2>Back and Forward</h2>
<?php
$arrColours = array (0=>"Red", 2=>"Green", 3=>"Blue", 1=>"Yellow", 4=>"White");
echo "<p>";
$strColour = reset($arrColours);
echo "$strColour ";
$strColour = next($arrColours);
echo "$strColour ";
$strColour = next($arrColours);
echo "$strColour ";
$strColour = prev($arrColours);
echo "$strColour ";
$strColour = current($arrColours);
echo "$strColour ";
$strColour = end($arrColours);
echo "$strColour ";
echo "</p>";
?>

<h2>Even More</h2>
<?php
$arrColours = array ("Red", "Green", "Blue", "Yellow", "White");
echo "<p>";
foreach($arrColours as $strColour)
    echo "$strColour ";
echo "</p>";
$strColour = array_pop($arrColours);
echo "<p>$strColour</p>";
$strColour = array_pop($arrColours);
echo "<p>$strColour</p>";
echo "<p>";
foreach($arrColours as $strColour)
    echo "$strColour ";
echo "</p>";
array_push($arrColours, "Grey");
echo "<p>";
foreach($arrColours as $strColour)
    echo "$strColour ";
echo "</p>";
?>


</body>

</html>

