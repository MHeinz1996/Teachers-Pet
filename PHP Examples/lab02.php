<html>
<head>
 <title>T'Chris Demo Product Page</title>
 <link href="lab02.css" rel="stylesheet" type = "text/css">

</head>
<body>


<center><img src="img/banner.jpg"></center><br>
<h1>Lab 02</h1>
<center>
<?php
echo "<table border=1 cellpadding = 5>";
for($vloop = 0; $vloop <= 10; $vloop++) 
  {
    echo "<tr>";
    if ($vloop == 0)
    {
      for ($hloop=0; $hloop<=10; $hloop++)
        if ($hloop == 0)
        {
           echo "<th></th>";
        }
        else
        {
	   echo "<th>$hloop</th>";
        }
      }
      else
      {
      for ($hloop=1; $hloop<=10; $hloop++) 
      {
        if($hloop == 1) 
	{
            echo "<th>$vloop</th>";
        }
        $total = $vloop*$hloop;
        if ($vloop == $hloop)
          {
             echo "<td><font color='green'>$total</td>"; 
          }
        else
          {
             echo "<td>".$vloop*$hloop."</td>";
          }
      }
      echo "</tr>";
    }
  }

echo "</table>";


?>
</center>
<center><img src="img/awesome.gif"></center>

<p id="footer">&copy;Tchris the Grate!</p>

</body>
</html>

