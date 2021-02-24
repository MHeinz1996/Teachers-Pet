<html>

<head><title><i>Supernatural</i> Store-EM420</title>
<link href="tstore.css" rel="stylesheet" type = "text/css">
</head>



<body>


<center><img src="img/banner.jpg"></center><br>
<h1>Welcome Valued Customer</h1>


<center>
<table cellpadding = 10>
<tr><td valign='top'><h2>Licensed Merchandise</h2><br><form action='storebycategory.php' method='Post'><button type='submit' name='Category' value='Licensed'/><img src="img/spn-joinhunt.jpg" width=200></button></form></td>
<td valign='top'><h2>Graphics</h2><br><form action='storebycategory.php' method='Post'><button type='submit' name='Category' value='Graphics'/><img src="img/spn-graphics.gif" width=200></button></form></td>
<td valign='top'><h2>Plushies</h2><br><form action='storebycategory.php' method='Post'><button type='submit' name='Category' value='Plushies'/><img src="img/spn-plushies.jpg" width=200></button></form></td>
<td valign='top'><h2>Collectibles</h2><br><form action='storebycategory.php' method='Post'><button type='submit' name='Category' value='Collectibles'/><img src="img/spn-collectibles.jpg" width=200></button></form></td>
<td valign='top'><h2>Everything!</h2><br><form action='storeallproducts.php' method='Post'><button type='submit' name='Category' value='Everything'/><img src="img/pie.jpg" width=200></button></form></td>
</tr>
</table>
<?php

require_once("database.php");
$Id = $_POST['Id'];
//create table around the information
$dbProdRecords = mysql_query("SELECT * FROM product where Id='$Id'", $dbLocalhost)

    or die("Problem reading table: " . mysql_error());

//create table around the information

while ($arrProdRecords = mysql_fetch_array($dbProdRecords)) 
{

    echo "<table cellpadding=10><tr><td rowspan=2><img src='img/" . $arrProdRecords["Picture"] . "' width=500></td>";
    echo "<td><h1>" . $arrProdRecords["Name"] . "</h1></td><td><h2>$" . $arrProdRecords["Price"] . "</h2></td></tr>";
    echo "<td colspan=2><p>" . $arrProdRecords["Descr"] . "</p></td></tr>";
    echo "<tr><td colspan=2></td><td><form action='storecart.php' method = 'post'>Invoice: <input type='text' name='invId' /><input type='hidden' name='Id' value='$Id' />
<button type='submit'><img src='img/cartbutton.png' width=150></button></form></td></tr></table>";
}



?>

<p id="footer">
<i>
Supernatural </i>
is a supernatural drama on the CW. The Winchester brothers are on the hunt for their father as they hunt demons, ghosts, monsters and other ghouls of the supernatural world.  This store is a nonprofit demo website run and authored by a Computer Science instructor for a class on database-driven websites. Running costs come out of the instructor's pocket. While the products displayed are real, there is no advertising on this site nor links to actually purchase the items.

No copyright infringement is intended and no profit made by the Store. The administrators acknowledge that Supernatural is the property of The CW Network, and the use of Supernatural images and text intend to fall under "fair use" and commentary.
<br>&copy;Tchris the Grate!</p>
</body>


</html>