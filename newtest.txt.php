<html>

<head>

 <title>T'Chris Chapter 12 Page</title>

 <link href="tchris-chap.css" rel="stylesheet" type = "text/css">


</head>

<body>


<center><h1>Chapter 12</h1></center><br>

<h2>Open and Close a File</h2>

<?php
$fileTextFile = fopen ("test.txt",'a');
if (!fclose($fileTextFile))
    echo "<p>Error closing file!</p>";
else
	echo "<p>File Closed</p>";
?>







</body>

</html>

