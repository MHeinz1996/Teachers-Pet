<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
      "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
   
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
<title>PHP Script</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>
<body>
<?php
// File: example10-11.php
$booTitle = 0;
$booFirstname = 0;
$booSurname = 0;
$strTitle = "";
$strFirstname = "";
$strSurname = "";


if (isset($_POST["submit"])) {
    if($_POST["strTitle"] == "Select...")
        $booTitle = 1;
    else
    	$strTitle = $_POST["strTitle"];
    if($_POST["strFirstname"] == NULL)
        $booFirstname = 1;
    else
    	$strFirstname = $_POST["strFirstname"];
    if($_POST["strSurname"] == NULL)
        $booSurname = 1;
    else
    	$strSurname = $_POST["strSurname"];
}
?>

<h2>Please select your title and name:</h2>

<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
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
<p><input type='submit' name='submit'/></p>
</form>

<?php
if (!($booTitle + $booFirstname + $booSurname) && isset($_POST["submit"]))
    echo "<p>All is well, you are " . $_POST["strTitle"] . " "  . $_POST["strFirstname"] . " " . $_POST["strSurname"] . "</p>";
?>  
</body>
</html>
