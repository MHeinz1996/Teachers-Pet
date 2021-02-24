<html>

<head>

 <title>T'Chris Chapter 10 Page</title>

 <link href="tchris-chap.css" rel="stylesheet" type = "text/css">


</head>

<body>


<center><h1>Chapter 10</h1></center><br>

<h2>Basic Form</h2>
<h3>Please enter your personal details:</h3>
<form action="example10-1.php" method="post">
<p>
<label for="strFirstname">Firstname: </label>
<input type="text" name="strFirstname" id="strFirstname"/>
</p><p>
<label for="strSurname">Surname: </label>
<input type="text" name="strSurname" id="strSurname"/>
</p><p>
<label for="strUsername">Username: </label>
<input type="text" name="strUsername" id="strUsername"/>
</p><p>
<label for="strPassword">Password: </label>
<input type="password" name="strPassword" id="strPassword"/>
</p><p>
<input type="submit"/>
</p>
</form>

<h2>A Better Solution</h2>
<h3>Please enter your personal details:</h3>
<form action='chap10.php' method='post'>
<p>
<label for="strFirstname">Firstname: </label>
<input type="text" name="strFirstname" id="strFirstname"/>
</p><p>
<label for="strSurname">Surname: </label>
<input type="text" name="strSurname" id="strSurname"/>
</p><p>
<label for="strUsername">Username: </label>
<input type="text" name="strUsername" id="strUsername"/>
</p><p>
<label for="strPassword">Password: </label>
<input type="password" name="strPassword" id="strPassword"/>
</p><p>
<input type="submit" name="submit"/>
</p>
</form>
<?php
if (isset($_POST["submit"])) {
    $strFirstname = $_POST["strFirstname"];
    $strSurname = $_POST["strSurname"];
    $strUsername = $_POST["strUsername"];
    $strPassword = $_POST["strPassword"];
    echo "<p>Greetings " . $strFirstname . " " . $strSurname . "</p>";
    echo "<p>Your username is " . $strUsername ."and your password is ". $strPassword."</p>";
}
?>

<h2>For Fun!</h2>
<h3>Please enter a date in Arabic numerals:</h3>
	<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
<p>
<label for="intDate">Year: </label>
<input type="text" name="intDate" id="intDate"/></p>
<p><input type="submit" name="submit"/></p>
</form>
<?php
if (isset($_POST["submit"])) {
    $intDate = $_POST["intDate"];
    echo "<p>$intDate is written ";
    while ($intDate >= 1000) {
        echo "M";
        $intDate -= 1000;
    }
    if ($intDate >= 900) {
        echo "CM";
        $intDate -= 900;
    }
    while ($intDate >= 500) {
        echo "D";
        $intDate -= 500;
    }
    if ($intDate >= 400) {
        echo "XD";
        $intDate -= 400;
    }
    while ($intDate >= 100) {
        echo "C";
        $intDate -= 100;
    }
    if ($intDate >= 90) {
        echo "XC";
        $intDate -= 90;
    }
    while ($intDate >= 50) {
        echo "L";
        $intDate -= 50;
    }
    if ($intDate >= 40) {
        echo "XL";
        $intDate -= 40;
    }
  while ($intDate >= 10) {
        echo "X";
        $intDate -= 10;
    }
    if ($intDate >= 9) {
        echo "IX";
        $intDate -= 9;
    }
    while ($intDate >= 5) {
        echo "V";
        $intDate -= 5;
    }
    if ($intDate >= 4) {
        echo "IV";
        $intDate -= 4;
    }
    while ($intDate >= 1) {
        echo "I";
        $intDate -= 1;
    }
    echo " in Roman numerals</p>";
} 
?>

<h2>Radio Buttons</h2>
<h3>Please select your favorite color:</h3>
<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
<p>
Blue: 
<input type="radio" name="strColor" value="blue"/>
Green: 
<input type="radio" name="strColor" value="green"/>
Yellow: 
<input type="radio" name="strColor" value="yellow"/>
Red: 
<input type="radio" name="strColor" value="red"/>
</p>
<p><input type='submit' name='submit'/></p>
</form>
<?php
if (isset($_POST['submit'])) {
    $strColor = $_POST["strColor"];
    echo "<p>Your favorite color is ".$strColor."</p>";
}
?>

<h2>Checkboxes</h2>
<h3>Please select your favorite colors:</h3>
<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
<p>
<label for="strBlue">Blue: </label>
<input type='checkbox' name='strColorBlue' value='blue' id='strBlue'/>
<label for="strGreen">Green: </label>
<input type='checkbox' name='strColorGreen' value='green' id='strGreen'/>
<label for="strYellow">Yellow: </label>
<input type='checkbox' name='strColorYellow' value='yellow' id='strYellow'/>
<label for="strRed">Red: </label>
<input type='checkbox' name='strColorRed' value='red' id='strRed'/></p>
<p><input type='submit' name='submit'/></p>
</form>
<?php
if (isset($_POST["submit"])) {
    $strColorBlue = $_POST["strColorBlue"];
    $strColorGreen = $_POST["strColorGreen"];
    $strColorYellow = $_POST["strColorYellow"];
    $strColorRed = $_POST["strColorRed"];
    echo "<p>Your favorite colors are $strColorBlue $strColorGreen $strColorYellow $strColorRed</p>";
}
?>

<h2>Selections</h2>
<h3>Please select your title:</h3>
<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
<p><select name='strTitle'>
	<option selected>--</option>
	<option>Mr</option>
	<option>Miss</option>
	<option>Ms</option>
	<option>Mrs</option>
	<option>Dr</option>
</select></p>
<p><input type='submit' name='submit'/></p>
</form>
<?php
if (isset($_POST["submit"])) {
    $strTitle = $_POST["strTitle"];
    echo "<p>Your title is $strTitle</p>";
}
?>

<h2>Text Areas</h2>
<h3>Please enter your address:</h3>
<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
<p><textarea name='strAddress' rows='5' cols='30'></textarea></p>
<p><input type='submit' name='submit'/></p>
</form>
<?php 
if (isset($_POST["submit"])) {
    $strAddress = $_POST["strAddress"];
    echo "<p>Your address is $strAddress</p>";
}
?>

<h2>Image Fields</h2>
<h3>Please click the image:</h3>
<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
<p><input type='image' src='img/lastscificupper.jpg' name='intImage'/></p>
</form>
<?php
if (isset($_POST["intImage_x"])) {
    $intImageX = $_POST["intImage_x"];
    $intImageY = $_POST["intImage_y"];
    if ($intImageY < 150 && $intImageX < 150)
        echo "<p>You clicked on or near the Circle</p>";
    if ($intImageY < 150 && $intImageX >= 150)
        echo "<p>You clicked on or near the Square</p>";
    if ($intImageY >= 150 && $intImageX < 150)
        echo "<p>You clicked on or near the Triangle</p>";
    if ($intImageY >= 150 && $intImageX >= 150)
        echo "<p>You clicked on or near the Pentagon</p>";
}
?> 

<h2>Form Validation</h2>
<?php
$booTitle = 0;
$booFirstname = 0;
$booSurname = 0;
$strAddress = "";
$strFirstname = "";
$strSurname = "";
?>
<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
<p><label for="strFirstname">Firstname: </label>
<input type="text" name="strFirstname" id="strFirstname"/>
</p><p>
<label for="strSurname">Surname: </label>
<input type="text" name="strSurname" id="strSurname"/>
</p>
<p><select name='strTitle'>
	<option selected>--</option>
	<option>Mr</option>
	<option>Miss</option>
	<option>Ms</option>
	<option>Mrs</option>
	<option>Dr</option>
</select></p>
<p><input type='submit' name='submit'/></p>
</form>
<?php
if (isset($_POST["submit"])) {
    if($_POST["strTitle"] == "--")
        {$booTitle = 1;
	echo "<p>Please select a title!</p>";}
    if($_POST["strFirstname"] == NULL)
        {$booFirstname = 1;
	echo "<p>Please enter a firstname!</p>";}
    if($_POST["strSurname"] == NULL)
        {$booSurname = 1;
	echo "<p>Please enter a lastname!</p>"; }
}
?>


</body>

</html>

