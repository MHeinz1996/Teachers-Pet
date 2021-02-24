<html>
<head>
 <title>T'Chris Demo Product Page</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">

</head>
<body>


<center><img src="img/banner.jpg"></center><br>
<center><img src="img/spnstore.jpg"></center><br>
<h1>Lab 04</h1>
<center>


<?php
echo "<a href='viewproducts-noformat.php'>An example!</a>";
echo "<table border=1 cellpadding = 5>";
echo "<tr><th>Customers</th><th>Invoices</th><th>Products</th><th>Purchases</th></tr>";
echo "<tr><td><a href='sviewcustomers.php'>View</a></td><td><a href='sviewip.php'>View</a></td><td><a href='sviewproducts.php'>View</a></td><td><a href='sviewinvoice.php'>View</a></td></tr>";
echo "<tr><td><a href='sdeletecustomers.php'>Delete</a></td><td><a href='sdeleteip.php'>Delete</a></td><td><a href='sdeleteproducts.php'>Delete</a></td><td><a href='sdeleteinvoice.php'>Delete</a></td></tr>";
echo "<tr><td><a href='sinsertcustomers.php'>Insert</a></td><td><a href='sinsertip.php'>Insert</a></td><td><a href='sinsertproducts.php'>Insert</a></td><td><a href='sinsertinvoice.php'>Insert</a></td></tr>";
echo "<tr><td><a href='supdatecustomers.php'>Update</a></td><td><a href='supdateip.php'>Update</a></td><td><a href='supdateproducts.php'>Update</a></td><td><a href='supdateinvoice.php'>Update</a></td></tr>";
echo "</table>";


?>

</center>
<center><img src="img/awesome.gif"></center>
<a href="index.php"><img src="img/home.png"></a>
<p id="footer">&copy;Tchris the Grate!</p>

</body>
</html>

