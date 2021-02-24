<?php
if(isset($_POST["submit"])) {
    $strUserPass = array (  "john" => "red",
                            "simon" => "green",
                            "liz" => "blue",
                            "david" => "yellow");
	if (array_key_exists($_POST["strUsername"],  $strUserPass)) 
    	if ($strUserPass[$_POST["strUsername"]] == $_POST["strPassword"])
	    	header("location:loginresponse.php");
        else
             echo"<h1>Incorrect Username or Password</h1>";
}
?>
<html>

<head>

 <title>T'Chris Chapter 13, Logins Page</title>

 <link href="tchris.css" rel="stylesheet" type = "text/css">


</head>

<body>
<h1>Login PHP</h1>
<?php
if(isset($_POST["submit"]))
    echo "<h1>Incorrect Username and/or password!</h1>";
?>
<form method="post" action="">
<p>
<label for="strUsername">Username: </label>
<input type="text" name="strUsername" id="strUsername"/></p>
<p>
<label for="strPassword">Password: </label>
<input type="password" name="strPassword" id="strPassword"/></p>
<p><input type="submit" name="submit" /></p>
</form>

</body>

</html>

