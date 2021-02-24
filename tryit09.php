<html>

<head>

 <title>T'Chris TryIt09 Page</title>

 <link href="tchris.css" rel="stylesheet" type = "text/css">


</head>

<body>
<h1>TryIt 9!</h1>

<h3>Please click the image:</h3>
<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
<p><input type='image' src='img/lastscifisupper.jpg' name='intImage'/></p>
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

<a href="index.php"><img src="img/home.png"></a>
<p id="footer">&copy;Tchris the Grate!</p>


</body>

</html>

