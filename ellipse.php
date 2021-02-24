<?php
class ellipse extends shape {
    function area() {
        $intWidth = parent::getWidth();
        $intHeight = parent::getHeight();
        $intArea = round(Pi() * ($intWidth/2) * ($intHeight/2));
        echo "<p>Area is $intArea</p>";
    }
}
?>
