<?php
function temperatureConvert10($floTemp, $strType = "C") {
    if ($strType == "F") {
        $floCelsius = (5/9)*($floTemp-32);
        echo "<p>$floTemp<sup>o</sup>F = $floCelsius<sup>o</sup>C</p>";
    }
    else {
        $floFahrenheit = (9/5)*$floTemp+32;
        echo "<p>$floTemp<sup>o</sup>C = $floFahrenheit<sup>o</sup>F</p>";
    }
}
?>



