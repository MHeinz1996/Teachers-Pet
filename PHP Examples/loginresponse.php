<html>

<head>

 <title>T'Chris Chapter 13, Login Response Page</title>

 <link href="tchris.css" rel="stylesheet" type = "text/css">


</head>

<body>
<h1>Login Response</h1>
<?php
if ($_SERVER["HTTP_REFERER"] != "/home/fotinfo/public_html/EM420/tchris/login.php")
   header("location: login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
      http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>PHP Script</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>
<body>
<h1>Well done, you are correctly logged in!</h1>
<a href="chap13.php"><img src="img/home.png">Return to Chapter 13</a>
</body>
</html>


