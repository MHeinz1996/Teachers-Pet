<h2>The Form Response</h2>
<?php
// File: example10-1.php
$strFirstname = $_POST["strFirstname"];
$strSurname = $_POST["strSurname"];
$strUsername = $_POST["strUsername"];
$strPassword = $_POST["strPassword"];
echo "<p>Greetings $strFirstname $strSurname</p>";
echo "<p>Your username is $strUsername and your password is $strPassword</p>";
?>