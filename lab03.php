<html>
<head>
 <title>T'Chris Demo Product Page</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">

</head>
<body>


<center><img src="img/banner.jpg"></center><br>
<center><img src="img/spnbeer.gif"></center><br>
<h1>Lab 03</h1>
<center>
<?php
echo "<a href='viewproducts-noformat.php'>An example!</a>";
echo "<table border=1 cellpadding = 5>";
echo "<tr><th>Customers</th><th>Invoices</th><th>Products</th><th>Purchases</th></tr>";
echo "<tr><td><a href='viewcustomers.php'>View</a></td><td><a href='viewpurchaseproducts.php'>View</a></td><td><a href='viewproducts.php'>View</a></td><td><a href='viewpurchases.php'>View</a></td></tr>";
echo "<tr><td><a href='deletecustomers.php'>Delete</a></td><td><a href='deletepurchaseproducts.php'>Delete</a></td><td><a href='deleteproducts.php'>Delete</a></td><td><a href='deletepurchases.php'>Delete</a></td></tr>";
echo "<tr><td><a href='insertcustomers.php'>Insert</a></td><td><a href='insertpurchaseproducts.php'>Insert</a></td><td><a href='insertproducts.php'>Insert</a></td><td><a href='insertpurchases.php'>Insert</a></td></tr>";
echo "<tr><td><a href='updatecustomers.php'>Update</a></td><td><a href='updatepurchaseproducts.php'>Update</a></td><td><a href='updateproducts.php'>Update</a></td><td><a href='updatepurchases.php'>Update</a></td></tr>";
echo "</table>";


?>
</center>
<center><img src="img/awesome.gif"></center>
<a href="index.php"><img src="img/home.png"></a>
<p id="footer">&copy;Tchris the Grate!</p>

</body>
</html>

